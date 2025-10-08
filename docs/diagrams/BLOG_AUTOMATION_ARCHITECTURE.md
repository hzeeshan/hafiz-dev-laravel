# Blog Automation System - Architecture Diagrams

## System Overview

```mermaid
graph TB
    subgraph "Content Input"
        A1[Topic Mode<br/>Title + Keywords]
        A2[YouTube Mode<br/>Video URL/Transcript]
        A3[Blog Remix Mode<br/>Article URL/Content]
        A4[Manual Mode<br/>Write in Filament]
    end

    subgraph "Content Generation Layer"
        B1[BlogContentGenerator<br/>Prism + Deepseek]
        B2[FluxImageService<br/>Together.ai FLUX.1]
        B3[Content Extractors<br/>YouTube/Blog APIs]
    end

    subgraph "Quality Control"
        C1[Code Validation]
        C2[SEO Check]
        C3[Review Status<br/>pending_review]
        C4[Telegram Alert<br/>📱 Ready for Review]
    end

    subgraph "Approval Process"
        D1[Human Review<br/>Filament Admin]
        D2{Approved?}
        D3[Edit & Resubmit]
        D4[Reject/Skip]
    end

    subgraph "Primary Publication"
        E1[Publish to hafiz.dev]
        E2[Update Status:<br/>published]
        E3[SEO Indexing]
    end

    subgraph "Multi-Platform Distribution"
        F1[Wait 48h<br/>SEO Priority]
        F2[Dev.to Publisher]
        F3[Hashnode Publisher]
        F4[LinkedIn Publisher]
        F5[Medium Publisher<br/>Optional]
    end

    subgraph "Analytics & Tracking"
        G1[post_publications<br/>Table]
        G2[Daily Analytics Sync]
        G3[Filament Dashboard]
        G4[Performance Reports]
    end

    A1 --> B1
    A2 --> B3
    A3 --> B3
    B3 --> B1
    A4 --> E1

    B1 --> B2
    B2 --> C1
    C1 --> C2
    C2 --> C3
    C3 --> C4
    C4 --> D1

    D1 --> D2
    D2 -->|Yes| E1
    D2 -->|Needs Changes| D3
    D2 -->|No| D4
    D3 --> D1

    E1 --> E2
    E2 --> E3
    E3 --> F1

    F1 --> F2
    F1 --> F3
    F1 --> F4
    F1 --> F5

    F2 --> G1
    F3 --> G1
    F4 --> G1
    F5 --> G1

    G1 --> G2
    G2 --> G3
    G3 --> G4
```

---

## Database Schema

```mermaid
erDiagram
    blog_topics ||--o{ posts : generates
    blog_topics ||--o{ blog_generation_logs : tracks
    posts ||--o{ post_publications : distributes
    posts }o--|| users : authored_by

    blog_topics {
        bigint id PK
        string title
        string slug UK
        enum generation_mode
        string source_url
        text source_content
        json source_metadata
        text custom_prompt
        enum status
        timestamp scheduled_for
        boolean publish_to_devto
        boolean publish_to_hashnode
        boolean publish_to_linkedin
        int priority
        timestamp created_at
    }

    posts {
        bigint id PK
        bigint blog_topic_id FK
        string title
        string slug UK
        text content
        string featured_image
        json tags
        enum status
        boolean auto_generated
        int views
        timestamp published_at
    }

    blog_generation_logs {
        bigint id PK
        bigint topic_id FK
        bigint post_id FK
        enum status
        text error_message
        int generation_time
        json cost_tracking
        string ai_provider
        timestamp created_at
    }

    post_publications {
        bigint id PK
        bigint post_id FK
        enum platform
        string external_url
        string external_id
        int views
        int likes
        int comments
        enum status
        timestamp published_at
    }
```

---

## Content Generation Flow

```mermaid
sequenceDiagram
    participant U as User
    participant F as Filament Admin
    participant Q as Queue
    participant G as BlogContentGenerator
    participant AI as Deepseek API
    participant IMG as Together.ai
    participant T as Telegram
    participant DB as Database

    U->>F: Create Topic<br/>(mode, source, prompt)
    F->>DB: Save blog_topics
    U->>F: Click "Generate Now"
    F->>Q: Dispatch GenerateBlogPostJob

    Q->>G: Process topic
    G->>DB: Log: started

    alt Topic Mode
        G->>AI: Generate from title+keywords
    else Context Mode (YouTube/Blog)
        G->>AI: Generate from source_content
    end

    AI-->>G: Return content (1500-2000 words)
    G->>DB: Log: content_generated

    G->>IMG: Generate featured image
    IMG-->>G: Return image URL
    G->>DB: Log: images_generated

    G->>DB: Create Post (status: pending_review)
    G->>DB: Update topic (status: review)
    G->>DB: Log: completed

    G->>T: Send notification<br/>"Post ready for review"
    T-->>U: 📱 Telegram alert

    U->>F: Review post

    alt Approved
        U->>F: Click "Approve & Publish"
        F->>DB: Update post (status: published)
        F->>Q: Dispatch distribution jobs
    else Needs Changes
        U->>F: Edit & save
        F->>DB: Update post
    else Rejected
        U->>F: Click "Skip"
        F->>DB: Update topic (status: skipped)
    end
```

---

## Multi-Platform Distribution Flow

```mermaid
sequenceDiagram
    participant P as Primary Post<br/>(hafiz.dev)
    participant S as Scheduler
    participant Q as Queue
    participant D as DevtoPublisher
    participant H as HashnodePublisher
    participant L as LinkedInPublisher
    participant DB as post_publications

    P->>S: Published at T
    Note over S: Wait 48 hours<br/>(SEO priority)

    S->>Q: T+48h: Dispatch PublishToDevtoJob
    S->>Q: T+48h: Dispatch PublishToHashnodeJob
    S->>Q: T+48h: Dispatch PublishToLinkedInJob

    par Parallel Distribution
        Q->>D: Publish to Dev.to
        D->>D: Convert markdown
        D->>D: Upload images
        D->>D: Add canonical URL
        D-->>DB: Save publication record<br/>(status: published)
    and
        Q->>H: Publish to Hashnode
        H->>H: Convert to GraphQL
        H->>H: Add canonical URL
        H-->>DB: Save publication record
    and
        Q->>L: Publish to LinkedIn
        L->>L: Create excerpt (500 words)
        L->>L: OAuth request
        L-->>DB: Save publication record
    end

    Note over DB: Daily: Fetch analytics<br/>(views, likes, comments)
```

---

## Topic Generation Modes

```mermaid
flowchart LR
    subgraph "Mode 1: Topic-Based"
        T1[User Input:<br/>Title + Keywords]
        T2[AI researches topic]
        T3[Generate from scratch]
        T4[Original content]
    end

    subgraph "Mode 2: YouTube"
        Y1[User Input:<br/>Video URL]
        Y2[Extract transcript]
        Y3[Parse metadata]
        Y4[Generate analysis<br/>+ Your perspective]
    end

    subgraph "Mode 3: Blog Remix"
        B1[User Input:<br/>Article URL]
        B2[Scrape content<br/>Jina AI Reader]
        B3[Parse article]
        B4[Generate response<br/>+ Alternative approach]
    end

    T1 --> T2 --> T3 --> T4
    Y1 --> Y2 --> Y3 --> Y4
    B1 --> B2 --> B3 --> B4

    T4 --> OUTPUT[Blog Post<br/>+ Featured Image]
    Y4 --> OUTPUT
    B4 --> OUTPUT
```

---

## Review Workflow States

```mermaid
stateDiagram-v2
    [*] --> pending: Topic created
    pending --> generating: User clicks "Generate"
    generating --> review: AI completes generation
    generating --> failed: AI error

    review --> approved: User approves
    review --> pending: User edits & resubmits
    review --> skipped: User rejects

    approved --> publishing: Publish to hafiz.dev
    publishing --> published: Success
    publishing --> failed: Publish error

    published --> distributing: After 48h delay
    distributing --> distributed: All platforms success
    distributing --> partial: Some platforms failed

    failed --> generating: Retry
    skipped --> [*]
    distributed --> [*]
    partial --> [*]
```

---

## Cost Breakdown Per Post

```mermaid
pie title Cost Per Blog Post ($0.077 total)
    "Content Generation (Deepseek)" : 2.6
    "Featured Image (Together.ai)" : 32.5
    "Inline Images 2× (Together.ai)" : 64.9
```

```mermaid
pie title Annual Cost for 52 Posts ($4.00 total)
    "Content Generation" : 2.5
    "Featured Image" : 32.5
    "Inline Images" : 65.0
```

---

## Platform Publishing Timeline

```mermaid
gantt
    title Multi-Platform Publishing Schedule
    dateFormat HH:mm
    axisFormat %H:%M

    section Primary
    Publish to hafiz.dev :done, p1, 00:00, 1m
    SEO Indexing :active, p2, after p1, 2880m

    section Secondary
    Wait 48h :crit, w1, after p1, 2880m
    Publish to Dev.to :d1, after w1, 5m
    Publish to Hashnode :h1, after w1, 5m
    Publish to LinkedIn :l1, after w1, 5m

    section Analytics
    Daily Sync :a1, after d1, 1440m
```

---

## Error Handling Flow

```mermaid
flowchart TD
    START[Job Started] --> TRY{Try Execute}

    TRY -->|Success| LOG_SUCCESS[Log: completed]
    TRY -->|Error| LOG_ERROR[Log: failed]

    LOG_ERROR --> RETRY{Retry Count < 3?}
    RETRY -->|Yes| BACKOFF[Exponential Backoff]
    BACKOFF --> TRY

    RETRY -->|No| NOTIFY[Telegram: Failed]
    NOTIFY --> MANUAL[Await Manual Fix]

    LOG_SUCCESS --> UPDATE[Update Status]
    UPDATE --> NOTIFY_SUCCESS[Telegram: Success]
    NOTIFY_SUCCESS --> END[Job Complete]

    MANUAL --> END
```

---

## Analytics Dashboard Layout

```
┌─────────────────────────────────────────────────────────────┐
│                  Blog Analytics Dashboard                    │
├─────────────────────────────────────────────────────────────┤
│                                                              │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐     │
│  │ Total Posts  │  │ Total Views  │  │ Total Leads  │     │
│  │     52       │  │    1,234     │  │      5       │     │
│  └──────────────┘  └──────────────┘  └──────────────┘     │
│                                                              │
│  ┌────────────────────────────────────────────────────┐    │
│  │ Performance by Platform                             │    │
│  ├────────────────────────────────────────────────────┤    │
│  │ hafiz.dev    ████████████ 450 views  (36%)        │    │
│  │ Dev.to       ██████████   350 views  (28%)        │    │
│  │ Hashnode     ███████      250 views  (20%)        │    │
│  │ LinkedIn     ████         184 views  (16%)        │    │
│  └────────────────────────────────────────────────────┘    │
│                                                              │
│  ┌────────────────────────────────────────────────────┐    │
│  │ Top Performing Posts                                │    │
│  ├────────────────────────────────────────────────────┤    │
│  │ 1. Laravel Multi-Tenancy Guide      234 views     │    │
│  │ 2. Automated Chrome Extension CI    198 views     │    │
│  │ 3. Building SaaS with Filament      176 views     │    │
│  └────────────────────────────────────────────────────┘    │
│                                                              │
│  ┌────────────────────────────────────────────────────┐    │
│  │ Generation Statistics                               │    │
│  ├────────────────────────────────────────────────────┤    │
│  │ Avg Generation Time: 90s                           │    │
│  │ Success Rate: 98%                                  │    │
│  │ Rejection Rate: 5%                                 │    │
│  │ Total Cost: $3.85 / $4.00 budget                   │    │
│  └────────────────────────────────────────────────────┘    │
│                                                              │
└─────────────────────────────────────────────────────────────┘
```

---

## Deployment Architecture

```mermaid
flowchart TB
    subgraph "Production Server (DigitalOcean)"
        subgraph "Web Layer"
            NGINX[Nginx<br/>Reverse Proxy]
            APP[Laravel App<br/>PHP 8.2]
        end

        subgraph "Background Jobs"
            SUPERVISOR[Supervisor]
            QUEUE[Queue Worker]
            SCHEDULER[Cron Scheduler]
        end

        subgraph "Data Layer"
            DB[(PostgreSQL)]
            REDIS[(Redis<br/>Cache + Queue)]
            STORAGE[Local Storage<br/>uploads/]
        end
    end

    subgraph "External Services"
        AI_DEEPSEEK[Deepseek API<br/>Content]
        AI_TOGETHER[Together.ai<br/>Images]
        TELEGRAM[Telegram Bot<br/>Notifications]
        DEVTO[Dev.to API]
        HASHNODE[Hashnode API]
        LINKEDIN[LinkedIn API]
        S3[S3 Bucket<br/>Optional]
    end

    USER[👤 User] --> NGINX
    NGINX --> APP
    APP --> DB
    APP --> REDIS
    APP --> STORAGE

    SUPERVISOR --> QUEUE
    SUPERVISOR --> SCHEDULER

    QUEUE --> AI_DEEPSEEK
    QUEUE --> AI_TOGETHER
    QUEUE --> TELEGRAM
    QUEUE --> DEVTO
    QUEUE --> HASHNODE
    QUEUE --> LINKEDIN

    STORAGE -.->|Future| S3
```

---

## Development Timeline

```mermaid
gantt
    title 4-Week Development Plan
    dateFormat YYYY-MM-DD

    section Phase 1: Core System
    Database migrations :p1-1, 2025-10-08, 2d
    Port BlogContentGenerator :p1-2, after p1-1, 2d
    Port FluxImageService :p1-3, after p1-1, 2d
    Filament UI updates :p1-4, after p1-2, 2d
    Testing & fixes :p1-5, after p1-4, 1d

    section Phase 2: Context Modes
    YouTubeExtractor :p2-1, after p1-5, 2d
    BlogPostExtractor :p2-2, after p1-5, 2d
    Update prompts :p2-3, after p2-2, 2d
    Testing context modes :p2-4, after p2-3, 1d

    section Phase 3: Distribution
    Dev.to integration :p3-1, after p2-4, 2d
    Hashnode integration :p3-2, after p2-4, 2d
    LinkedIn integration :p3-3, after p3-2, 2d
    Distribution testing :p3-4, after p3-3, 1d

    section Phase 4: Polish
    Analytics dashboard :p4-1, after p3-4, 2d
    Documentation :p4-2, after p3-4, 2d
    Production deployment :crit, p4-3, after p4-2, 1d

    section Milestones
    Core Complete :milestone, m1, after p1-5, 0d
    Context Complete :milestone, m2, after p2-4, 0d
    Distribution Complete :milestone, m3, after p3-4, 0d
    Production Launch :milestone, m4, after p4-3, 0d
```

---

**Document Version**: 1.0
**Last Updated**: October 8, 2025
**Status**: Planning Complete
