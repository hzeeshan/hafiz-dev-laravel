<script>
(function() {
    var stringsEl = document.getElementById('tool-strings');
    var S = {
        all_themes: stringsEl?.dataset.allThemes || 'All Themes',
        love: stringsEl?.dataset.love || 'Love & Romance',
        nature: stringsEl?.dataset.nature || 'Nature & Seasons',
        emotions: stringsEl?.dataset.emotions || 'Emotions & Feelings',
        night: stringsEl?.dataset.night || 'Night & Dreams',
        journey: stringsEl?.dataset.journey || 'Journey & Freedom',
        urban: stringsEl?.dataset.urban || 'Urban & Modern',
        heartbreak: stringsEl?.dataset.heartbreak || 'Heartbreak & Loss',
        theme_label: stringsEl?.dataset.themeLabel || 'Theme',
        word_count_label: stringsEl?.dataset.wordCountLabel || 'Word Count',
        display_label: stringsEl?.dataset.displayLabel || 'Display',
        spaced: stringsEl?.dataset.spaced || 'Spaced',
        one_per_line: stringsEl?.dataset.onePerLine || 'One per Line',
        comma_separated: stringsEl?.dataset.commaSeparated || 'Comma Separated',
        numbered_list: stringsEl?.dataset.numberedList || 'Numbered List',
        include_rhymes: stringsEl?.dataset.includeRhymes || 'Include Rhymes',
        generated_words: stringsEl?.dataset.generatedWords || 'Generated Words',
        placeholder: stringsEl?.dataset.placeholder || "Click 'Generate' to get random songwriting words...",
        generate: stringsEl?.dataset.generate || 'Generate',
        copy: stringsEl?.dataset.copy || 'Copy',
        download: stringsEl?.dataset.download || 'Download',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        words_generated: stringsEl?.dataset.wordsGenerated || 'Words Generated',
        theme: stringsEl?.dataset.theme || 'Theme',
        avg_syllables: stringsEl?.dataset.avgSyllables || 'Avg Syllables',
        words_in_pool: stringsEl?.dataset.wordsInPool || 'Words in Pool',
        no_words: stringsEl?.dataset.noWords || 'No words available for the selected theme.',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Generate some words first.',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download. Generate some words first.',
        words_downloaded: stringsEl?.dataset.wordsDownloaded || 'Words downloaded!',
        words_generated_msg: stringsEl?.dataset.wordsGeneratedMsg || 'word(s) generated!',
        copied_text: stringsEl?.dataset.copiedText || 'Copied!',
    };

    // Songwriting word lists by theme
    var WORDS = {
        love: [
            'heart','kiss','darling','forever','embrace','passion','desire','tender','beloved','cherish',
            'devotion','adore','sweetheart','flame','roses','whisper','promise','gentle','warmth','bliss',
            'soulmate','enchant','treasure','honey','affection','caress','longing','rapture','swoon','charm',
            'infatuation','romance','valentine','amour','crush','spark','glow','magnetic','captivate','yearn',
            'obsession','heaven','paradise','angel','divine','sacred','eternal','faithful','true','pure',
            'tangled','intertwined','inseparable','breathless','butterflies','euphoria','devoted','smitten','enamored','spellbound'
        ],
        nature: [
            'river','mountain','ocean','sunset','breeze','meadow','forest','bloom','sunrise','storm',
            'rain','thunder','lightning','wildflower','valley','horizon','shore','tide','waves','mist',
            'canyon','waterfall','stream','garden','petal','roots','branches','willow','cedar','pine',
            'autumn','winter','spring','summer','harvest','frost','snow','sunshine','moonlight','starlight',
            'canyon','desert','prairie','island','cliff','stone','crystal','coral','ember','flame',
            'cloud','rainbow','dew','vine','moss','fern','thorn','blossom','seed','soil'
        ],
        emotions: [
            'joy','sorrow','hope','fear','anger','peace','wonder','grief','pride','shame',
            'courage','doubt','faith','despair','gratitude','envy','calm','rage','love','hate',
            'trust','betrayal','freedom','trapped','alive','broken','whole','empty','full','wild',
            'restless','serene','anxious','brave','timid','fierce','gentle','burning','frozen','shattered',
            'healing','aching','soaring','falling','rising','sinking','floating','drowning','breathing','trembling',
            'numb','electric','hollow','radiant','fragile','resilient','vulnerable','invincible','weary','awakened'
        ],
        night: [
            'midnight','stars','moon','shadow','darkness','twilight','dream','sleep','silence','whisper',
            'constellation','galaxy','cosmos','nocturnal','velvet','eclipse','luminous','glow','shimmer','haze',
            'phantom','ghost','haunted','mystery','secret','hidden','veil','cloak','dusk','dawn',
            'candle','lantern','firefly','owl','wolf','howl','lullaby','insomnia','restless','wandering',
            'ethereal','celestial','astral','nebula','void','abyss','infinite','eternal','timeless','forgotten',
            'reverie','slumber','trance','lucid','nocturne','serenade','sonnet','ballad','requiem','soliloquy'
        ],
        journey: [
            'road','path','highway','wanderer','traveler','compass','map','horizon','destination','miles',
            'footsteps','tracks','bridge','crossing','border','frontier','adventure','explore','discover','roam',
            'drift','sail','fly','soar','climb','escape','chase','pursue','search','quest',
            'nomad','pilgrim','voyager','navigator','pioneer','trailblazer','vagabond','gypsy','exile','refugee',
            'homeward','outbound','departure','arrival','return','farewell','goodbye','hello','welcome','stranger',
            'freedom','wings','wind','open','wild','untamed','restless','fearless','boundless','limitless'
        ],
        urban: [
            'city','street','neon','concrete','skyline','downtown','traffic','subway','crowd','hustle',
            'graffiti','alley','rooftop','penthouse','basement','elevator','staircase','window','mirror','glass',
            'steel','chrome','digital','signal','frequency','static','electric','wired','wireless','broadcast',
            'pavement','sidewalk','crosswalk','intersection','highway','bridge','tunnel','station','terminal','platform',
            'billboard','headline','spotlight','camera','screen','pixel','data','code','network','pulse',
            'rhythm','beat','bass','volume','speaker','microphone','headphones','vinyl','tape','stereo'
        ],
        heartbreak: [
            'tears','goodbye','shattered','broken','lonely','empty','ache','regret','memory','ghost',
            'fading','silence','cold','distant','lost','gone','missing','hollow','numb','bruised',
            'scarred','wounded','bleeding','drowning','suffocating','crumbling','withering','dying','burning','freezing',
            'abandoned','forgotten','betrayed','deceived','rejected','discarded','replaced','erased','invisible','worthless',
            'bitter','toxic','poison','chains','cage','prison','trapped','haunted','cursed','damned',
            'ruins','ashes','dust','smoke','shadow','echo','remnant','fragment','wreckage','aftermath'
        ]
    };

    // Rhyme pairs for songwriting
    var RHYME_PAIRS = [
        ['heart','start'],['heart','apart'],['heart','art'],['love','above'],['love','dove'],
        ['fire','desire'],['fire','higher'],['night','light'],['night','fight'],['night','right'],
        ['day','way'],['day','stay'],['day','say'],['rain','pain'],['rain','again'],
        ['eyes','skies'],['eyes','rise'],['eyes','lies'],['dream','stream'],['dream','seem'],
        ['soul','whole'],['soul','control'],['time','rhyme'],['time','climb'],['time','shine'],
        ['sun','run'],['sun','done'],['sun','one'],['moon','soon'],['moon','tune'],
        ['tears','fears'],['tears','years'],['blue','true'],['blue','through'],['blue','you'],
        ['alone','known'],['alone','phone'],['alone','home'],['fall','call'],['fall','all'],
        ['mind','find'],['mind','behind'],['mind','kind'],['kiss','miss'],['kiss','bliss'],
        ['breath','death'],['gold','told'],['gold','hold'],['cold','old'],['cold','bold'],
        ['free','sea'],['free','me'],['free','key'],['sing','ring'],['sing','thing'],
        ['fly','sky'],['fly','high'],['fly','cry'],['deep','sleep'],['deep','keep'],
        ['wild','child'],['burn','turn'],['burn','learn'],['dance','chance'],['dance','romance'],
        ['pride','side'],['pride','ride'],['fade','shade'],['fade','made'],['world','girl'],
        ['voice','choice'],['name','flame'],['name','game'],['gone','dawn'],['gone','on'],
        ['break','wake'],['break','ache'],['sweet','beat'],['sweet','street'],['sweet','feet'],
        ['alive','survive'],['alive','drive'],['tomorrow','sorrow'],['away','today'],['forever','together'],
        ['believe','leave'],['believe','receive'],['remember','december'],['story','glory'],['feeling','healing']
    ];

    var THEME_LABELS = {
        all: S.all_themes,
        love: S.love,
        nature: S.nature,
        emotions: S.emotions,
        night: S.night,
        journey: S.journey,
        urban: S.urban,
        heartbreak: S.heartbreak
    };

    // DOM Elements
    var wordTheme = document.getElementById('word-theme');
    var wordCount = document.getElementById('word-count');
    var wordSeparator = document.getElementById('word-separator');
    var includeRhymes = document.getElementById('include-rhymes');
    var wordOutput = document.getElementById('word-output');
    var btnGenerate = document.getElementById('btn-generate');
    var btnCopy = document.getElementById('btn-copy');
    var btnDownload = document.getElementById('btn-download');
    var btnSample = document.getElementById('btn-sample');
    var btnClear = document.getElementById('btn-clear');
    var statsBar = document.getElementById('stats-bar');
    var statCount = document.getElementById('stat-count');
    var statTheme = document.getElementById('stat-theme');
    var statSyllables = document.getElementById('stat-syllables');
    var statPool = document.getElementById('stat-pool');
    var successNotification = document.getElementById('success-notification');
    var successMessage = document.getElementById('success-message');
    var errorNotification = document.getElementById('error-notification');
    var errorMessage = document.getElementById('error-message');

    function getPool() {
        var theme = wordTheme.value;
        if (theme === 'all') {
            return Object.values(WORDS).flat();
        }
        return WORDS[theme] || [];
    }

    function estimateSyllables(word) {
        word = word.toLowerCase().replace(/[^a-z]/g, '');
        if (word.length <= 3) return 1;
        word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
        word = word.replace(/^y/, '');
        var m = word.match(/[aeiouy]{1,2}/g);
        return m ? m.length : 1;
    }

    function generate() {
        var pool = getPool();
        var count = parseInt(wordCount.value) || 12;
        count = Math.max(1, Math.min(100, count));
        wordCount.value = count;

        if (pool.length === 0) {
            showError(S.no_words);
            return;
        }

        var withRhymes = includeRhymes.checked;
        var result = [];

        if (withRhymes) {
            var pairCount = Math.ceil(count / 2);
            var shuffledPairs = RHYME_PAIRS.slice().sort(function() { return Math.random() - 0.5; });
            var selectedPairs = shuffledPairs.slice(0, Math.min(pairCount, shuffledPairs.length));

            for (var i = 0; i < selectedPairs.length && result.length < count; i++) {
                result.push(selectedPairs[i][0]);
                if (result.length < count) {
                    result.push(selectedPairs[i][1]);
                }
            }

            while (result.length < count) {
                result.push(pool[Math.floor(Math.random() * pool.length)]);
            }
        } else {
            var shuffled = pool.slice().sort(function() { return Math.random() - 0.5; });
            result = shuffled.slice(0, Math.min(count, pool.length));

            while (result.length < count) {
                result.push(pool[Math.floor(Math.random() * pool.length)]);
            }
        }

        var sep = wordSeparator.value;
        var output = '';
        if (sep === 'space') {
            output = result.join('  ');
        } else if (sep === 'newline') {
            output = result.join('\n');
        } else if (sep === 'comma') {
            output = result.join(', ');
        } else if (sep === 'numbered') {
            output = result.map(function(w, i) { return (i + 1) + '. ' + w; }).join('\n');
        }

        wordOutput.value = output;

        var totalSyllables = result.reduce(function(sum, w) { return sum + estimateSyllables(w); }, 0);
        var avgSyllables = (totalSyllables / result.length).toFixed(1);

        statCount.textContent = result.length;
        statTheme.textContent = THEME_LABELS[wordTheme.value] || 'All';
        statSyllables.textContent = avgSyllables;
        statPool.textContent = pool.length;
        statsBar.classList.remove('hidden');

        showSuccess(result.length + ' ' + S.words_generated_msg);
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(function() { successNotification.classList.add('hidden'); }, 3000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(function() { errorNotification.classList.add('hidden'); }, 5000);
    }

    function copyOutput() {
        var output = wordOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(function() {
            var originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied_text;
            btnCopy.classList.add('text-green-400', 'border-green-400');
            setTimeout(function() { btnCopy.innerHTML = originalHTML; btnCopy.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    }

    function downloadOutput() {
        var output = wordOutput.value;
        if (!output) { showError(S.nothing_to_download); return; }
        var blob = new Blob([output], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'songwriting-words.txt';
        a.click();
        URL.revokeObjectURL(url);
        showSuccess(S.words_downloaded);
    }

    function loadSample() {
        wordTheme.value = 'love';
        wordCount.value = 16;
        wordSeparator.value = 'newline';
        includeRhymes.checked = true;
        generate();
    }

    function clearAll() {
        wordOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    }

    // Event Listeners
    btnGenerate.addEventListener('click', generate);
    btnCopy.addEventListener('click', copyOutput);
    btnDownload.addEventListener('click', downloadOutput);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); generate(); }
    });
})();
</script>
