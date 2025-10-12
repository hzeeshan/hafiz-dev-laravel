#!/bin/bash

# Hafiz Dev Laravel Production Deployment Script
# Local Build + rsync deployment for resource-constrained servers

set -e  # Exit on any error

# Configuration
SERVER_USER="root"  
SERVER_HOST="hafiz-server-2025"  
SERVER_PATH="/var/www/hafiz.dev"
BACKUP_COUNT=3

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Functions
log_info() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

log_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

log_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

log_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Check prerequisites
check_prerequisites() {
    log_info "Checking prerequisites..."

    # Check if git is clean
    if [[ -n $(git status --porcelain) ]]; then
        log_error "Working directory is not clean. Please commit or stash your changes."
        exit 1
    fi

    # Check if we're on main branch
    BRANCH=$(git branch --show-current)
    if [[ "$BRANCH" != "main" ]]; then
        log_warning "You're not on the main branch (current: $BRANCH)"
        read -p "Continue anyway? (y/N): " -n 1 -r
        echo
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            log_info "Deployment cancelled"
            exit 0
        fi
    fi

    # Check if rsync is available
    if ! command -v rsync &> /dev/null; then
        log_error "rsync is not installed. Please install it first."
        exit 1
    fi

    # Check if we can reach the server
    if ! ssh -o ConnectTimeout=5 "$SERVER_USER@$SERVER_HOST" "echo 'Server reachable'" &> /dev/null; then
        log_error "Cannot connect to server $SERVER_HOST"
        exit 1
    fi

    log_success "Prerequisites check passed"
}

# Build assets locally
build_assets() {
    log_info "Building assets locally..."

    # Install production dependencies
    log_info "Installing Composer dependencies..."
    composer install --no-dev --optimize-autoloader --no-interaction --quiet

    # Install npm dependencies if package-lock.json changed
    if [[ package-lock.json -nt node_modules/.package-lock.json ]] || [[ ! -d node_modules ]]; then
        log_info "Installing npm dependencies..."
        npm ci --silent
    fi

    # Build production assets
    log_info "Building production assets..."
    npm run build

    # Publish vendor assets locally (will be synced to server)
    log_info "Publishing vendor assets..."
    php artisan livewire:publish --assets
    php artisan filament:assets

    log_success "Assets built successfully"
}

# Deploy to server
deploy_to_server() {
    log_info "Deploying to server..."

    # Create backup on server
    log_info "Creating backup on server..."
    ssh "$SERVER_USER@$SERVER_HOST" "
        cd $SERVER_PATH
        TIMESTAMP=\$(date +%Y%m%d_%H%M%S)
        mkdir -p backups
        mkdir -p backups/database

        # Create database backup
        if [[ -f database/database.sqlite ]]; then
            echo 'Creating database backup...'
            cp database/database.sqlite backups/database/database_\$TIMESTAMP.sqlite

            # Keep only last 7 database backups
            cd backups/database
            ls -t database_*.sqlite | tail -n +8 | xargs -r rm --
            cd ../..
        fi

        # Create full site backup
        tar -czf backups/backup_\$TIMESTAMP.tar.gz --exclude='backups' --exclude='storage/logs' .

        # Keep only last $BACKUP_COUNT full backups
        cd backups
        ls -t backup_*.tar.gz | tail -n +$((BACKUP_COUNT + 1)) | xargs -r rm --

        echo \"Backup created: backup_\$TIMESTAMP.tar.gz\"
        echo \"Database backup: database_\$TIMESTAMP.sqlite\"
    "

    # Sync files to server
    log_info "Syncing files to server..."
    rsync -avz --delete \
        --exclude-from='.rsync-exclude' \
        --progress \
        ./ "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/"

    log_success "Files synced to server"
}

# Run server-side commands
run_server_commands() {
    log_info "Running server-side commands..."

    ssh "$SERVER_USER@$SERVER_HOST" "
        cd $SERVER_PATH

        # Set proper permissions with correct ownership
        sudo chown -R www-data:www-data storage bootstrap/cache database/
        sudo chmod -R 775 storage bootstrap/cache
        sudo chmod 775 database/
        sudo chmod 664 database/*.sqlite 2>/dev/null || true
        sudo chmod -R 755 .

        # Create storage symlink (force recreate to ensure it's correct)
        php artisan storage:link --force

        # Run migrations
        php artisan migrate --force

        # Clear all caches
        php artisan optimize:clear
        php artisan filament:optimize-clear

        # Rebuild all caches
        php artisan optimize
        php artisan filament:optimize

        # Regenerate sitemap with production URLs
        php artisan sitemap:generate

        # Restart queue workers if any
        php artisan queue:restart

        echo 'Server commands completed successfully'
    "

    log_success "Server-side commands completed"
}

# Main deployment process
main() {
    echo "=========================================="
    echo "   Hafiz Dev Laravel Production Deployment"
    echo "=========================================="
    echo

    START_TIME=$(date +%s)

    check_prerequisites
    build_assets
    deploy_to_server
    run_server_commands

    END_TIME=$(date +%s)
    DURATION=$((END_TIME - START_TIME))

    echo
    echo "=========================================="
    log_success "Deployment completed successfully!"
    log_info "Total time: ${DURATION} seconds"
    log_info "Server: https://hafiz.dev"
    echo "=========================================="
}

# Show help
show_help() {
    echo "Hafiz Dev Laravel Deployment Script"
    echo
    echo "Usage: $0 [OPTIONS]"
    echo
    echo "Options:"
    echo "  -h, --help     Show this help message"
    echo "  -c, --check    Check prerequisites only"
    echo
    echo "Configuration:"
    echo "  SERVER_USER: $SERVER_USER"
    echo "  SERVER_HOST: $SERVER_HOST"
    echo "  SERVER_PATH: $SERVER_PATH"
    echo
    echo "Make sure to update the configuration variables at the top of this script."
}

# Handle command line arguments
case "${1:-}" in
    -h|--help)
        show_help
        exit 0
        ;;
    -c|--check)
        check_prerequisites
        exit 0
        ;;
    "")
        main
        ;;
    *)
        log_error "Unknown option: $1"
        show_help
        exit 1
        ;;
esac
