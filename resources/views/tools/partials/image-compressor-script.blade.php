{{-- Browser Image Compression Library --}}
<script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.2/dist/browser-image-compression.js"></script>
{{-- JSZip for downloading multiple files --}}
<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
{{-- FileSaver.js for saving files --}}
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        dropText: stringsEl?.dataset.dropText || 'Drag & drop images here or click to browse',
        dropHere: stringsEl?.dataset.dropHere || 'Drop images here',
        supports: stringsEl?.dataset.supports || 'Supports: JPEG, PNG, WebP, GIF',
        pasteHint: stringsEl?.dataset.pasteHint || 'Tip: You can also paste images from clipboard (Ctrl+V / Cmd+V)',
        imagesQueue: stringsEl?.dataset.imagesQueue || 'Images Queue',
        clearAll: stringsEl?.dataset.clearAll || 'Clear All',
        compress: stringsEl?.dataset.compress || 'Compress',
        compressAll: stringsEl?.dataset.compressAll || 'Compress All',
        download: stringsEl?.dataset.download || 'Download',
        downloadAllZip: stringsEl?.dataset.downloadAllZip || 'Download All (ZIP)',
        compressing: stringsEl?.dataset.compressing || 'Compressing...',
        creatingZip: stringsEl?.dataset.creatingZip || 'Creating ZIP...',
        compressionSummary: stringsEl?.dataset.compressionSummary || 'Compression Summary',
        images: stringsEl?.dataset.images || 'Images',
        originalSize: stringsEl?.dataset.originalSize || 'Original Size',
        compressedSize: stringsEl?.dataset.compressedSize || 'Compressed Size',
        totalSavings: stringsEl?.dataset.totalSavings || 'Total Savings',
        original: stringsEl?.dataset.original || 'Original',
        compressed: stringsEl?.dataset.compressed || 'Compressed',
        smaller: stringsEl?.dataset.smaller || 'smaller',
        compressionFailed: stringsEl?.dataset.compressionFailed || 'Compression failed',
        allAlreadyCompressed: stringsEl?.dataset.allAlreadyCompressed || 'All images already compressed!',
        successCompressedOne: stringsEl?.dataset.successCompressedOne || 'Successfully compressed {count} image!',
        successCompressedMany: stringsEl?.dataset.successCompressedMany || 'Successfully compressed {count} images!',
        compressedWithErrors: stringsEl?.dataset.compressedWithErrors || 'Compressed {success} images. {failed} failed.',
        noCompressedToDownload: stringsEl?.dataset.noCompressedToDownload || 'No compressed images to download.',
        zipFailed: stringsEl?.dataset.zipFailed || 'Failed to create ZIP file.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded: {filename}',
        downloadedZip: stringsEl?.dataset.downloadedZip || 'Downloaded {count} images as ZIP!',
        pastedFromClipboard: stringsEl?.dataset.pastedFromClipboard || 'Image pasted from clipboard!',
        sliderSmaller: stringsEl?.dataset.sliderSmaller || 'Smaller',
        sliderHigherQuality: stringsEl?.dataset.sliderHigherQuality || 'Higher Quality',
    };

    // DOM Elements
    const dropZone = document.getElementById('drop-zone');
    const dropZoneText = document.getElementById('drop-zone-text');
    const fileInput = document.getElementById('file-input');
    const qualitySlider = document.getElementById('quality-slider');
    const qualityValue = document.getElementById('quality-value');
    const maxWidthInput = document.getElementById('max-width');
    const maxHeightInput = document.getElementById('max-height');
    const outputFormatSelect = document.getElementById('output-format');
    const autoCompressCheckbox = document.getElementById('auto-compress');
    const imageQueue = document.getElementById('image-queue');
    const imageList = document.getElementById('image-list');
    const actionButtons = document.getElementById('action-buttons');
    const btnCompressAll = document.getElementById('btn-compress-all');
    const btnDownloadAll = document.getElementById('btn-download-all');
    const btnClearAll = document.getElementById('btn-clear-all');
    const compressText = document.getElementById('compress-text');
    const downloadText = document.getElementById('download-text');
    const summaryStats = document.getElementById('summary-stats');
    const statTotalImages = document.getElementById('stat-total-images');
    const statOriginalSize = document.getElementById('stat-original-size');
    const statCompressedSize = document.getElementById('stat-compressed-size');
    const statTotalSavings = document.getElementById('stat-total-savings');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');
    const presetButtons = document.querySelectorAll('.preset-btn');

    // State
    let images = [];
    let imageIdCounter = 0;

    // ===== Settings Persistence =====

    const STORAGE_KEY = 'imageCompressorSettings';

    function saveSettings() {
        const settings = {
            quality: qualitySlider.value,
            maxWidth: maxWidthInput.value,
            maxHeight: maxHeightInput.value,
            outputFormat: outputFormatSelect.value,
            autoCompress: autoCompressCheckbox.checked
        };
        localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
    }

    function loadSettings() {
        try {
            const saved = localStorage.getItem(STORAGE_KEY);
            if (saved) {
                const settings = JSON.parse(saved);
                if (settings.quality) {
                    qualitySlider.value = settings.quality;
                    qualityValue.textContent = settings.quality + '%';
                }
                if (settings.maxWidth) maxWidthInput.value = settings.maxWidth;
                if (settings.maxHeight) maxHeightInput.value = settings.maxHeight;
                if (settings.outputFormat) outputFormatSelect.value = settings.outputFormat;
                if (settings.autoCompress !== undefined) autoCompressCheckbox.checked = settings.autoCompress;
                updatePresetActiveState();
            }
        } catch (e) {
            console.error('Error loading settings:', e);
        }
    }

    // ===== Quality Presets =====

    function setQualityPreset(value) {
        qualitySlider.value = value;
        qualityValue.textContent = value + '%';
        updatePresetActiveState();
        saveSettings();
    }

    function updatePresetActiveState() {
        const currentQuality = parseInt(qualitySlider.value);
        presetButtons.forEach(btn => {
            const presetValue = parseInt(btn.dataset.quality);
            if (presetValue === currentQuality) {
                btn.classList.remove('border-gray-600');
                btn.classList.add('border-gold', 'bg-gold/10');
            } else {
                btn.classList.add('border-gray-600');
                btn.classList.remove('border-gold', 'bg-gold/10');
            }
        });
    }

    // ===== Utility Functions =====

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function calculateSavings(original, compressed) {
        if (original === 0) return 0;
        return Math.round(((original - compressed) / original) * 100);
    }

    function getFileExtension(mimeType) {
        const map = {
            'image/jpeg': '.jpg',
            'image/png': '.png',
            'image/webp': '.webp',
            'image/gif': '.gif'
        };
        return map[mimeType] || '.jpg';
    }

    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // Get image dimensions from file
    function getImageDimensions(file) {
        return new Promise((resolve) => {
            const img = new Image();
            img.onload = function() {
                resolve({ width: this.width, height: this.height });
                URL.revokeObjectURL(img.src);
            };
            img.onerror = function() {
                resolve({ width: 0, height: 0 });
                URL.revokeObjectURL(img.src);
            };
            img.src = URL.createObjectURL(file);
        });
    }

    // ===== Button Text Updates =====

    function updateButtonText() {
        const imageCount = images.length;

        if (imageCount === 1) {
            compressText.textContent = S.compress;
            downloadText.textContent = S.download;
        } else {
            compressText.textContent = S.compressAll;
            downloadText.textContent = S.downloadAllZip;
        }
    }

    // ===== Image Queue Functions =====

    async function addImageToQueue(file) {
        const id = imageIdCounter++;
        const reader = new FileReader();

        // Get dimensions first
        const dimensions = await getImageDimensions(file);

        reader.onload = async function(e) {
            const image = {
                id,
                file,
                originalFile: file,
                originalSize: file.size,
                originalWidth: dimensions.width,
                originalHeight: dimensions.height,
                compressedFile: null,
                compressedSize: null,
                compressedWidth: null,
                compressedHeight: null,
                thumbnail: e.target.result,
                status: 'pending' // pending, compressing, done, error
            };

            images.push(image);
            renderImageItem(image);
            updateUI();

            // Auto-compress if enabled
            if (autoCompressCheckbox.checked) {
                await compressImage(image);
                updateUI();
            }
        };

        reader.readAsDataURL(file);
    }

    function renderImageItem(image) {
        const item = document.createElement('div');
        item.id = `image-${image.id}`;
        item.className = 'flex items-center gap-4 p-4 bg-darkBg rounded-lg border border-gold/10';

        const dimensionsText = image.originalWidth && image.originalHeight
            ? ` (${image.originalWidth} × ${image.originalHeight})`
            : '';

        item.innerHTML = `
            <img src="${image.thumbnail}" alt="${image.file.name}" class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
            <div class="flex-1 min-w-0">
                <p class="text-light font-medium truncate text-sm">${image.file.name}</p>
                <div class="flex flex-wrap items-center gap-x-2 gap-y-1 mt-1">
                    <span id="original-info-${image.id}" class="text-light-muted text-xs">${S.original}: ${formatFileSize(image.originalSize)}${dimensionsText}</span>
                    <span id="arrow-${image.id}" class="text-light-muted text-xs hidden">→</span>
                    <span id="compressed-info-${image.id}" class="text-xs text-gold hidden"></span>
                    <span id="savings-${image.id}" class="text-xs text-green-400 hidden"></span>
                </div>
                <div id="progress-${image.id}" class="hidden mt-2">
                    <div class="h-1.5 bg-gold/20 rounded-full overflow-hidden">
                        <div class="h-full bg-gold rounded-full animate-pulse" style="width: 100%"></div>
                    </div>
                    <span class="text-xs text-gold mt-1 block">${S.compressing}</span>
                </div>
                <div id="error-${image.id}" class="hidden mt-1">
                    <span class="text-xs text-red-400">${S.compressionFailed}</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button id="download-btn-${image.id}" class="p-2 text-light-muted hover:text-gold transition-colors cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed" disabled title="${S.download}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </button>
                <button class="remove-btn p-2 text-light-muted hover:text-red-400 transition-colors cursor-pointer" data-id="${image.id}" title="${S.clearAll}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        `;

        imageList.appendChild(item);

        // Add event listeners
        item.querySelector('.remove-btn').addEventListener('click', function() {
            removeImage(parseInt(this.dataset.id));
        });

        item.querySelector(`#download-btn-${image.id}`).addEventListener('click', function() {
            downloadSingle(image.id);
        });
    }

    function updateImageItem(image) {
        const arrowEl = document.getElementById(`arrow-${image.id}`);
        const compressedInfoEl = document.getElementById(`compressed-info-${image.id}`);
        const savingsEl = document.getElementById(`savings-${image.id}`);
        const progressEl = document.getElementById(`progress-${image.id}`);
        const errorEl = document.getElementById(`error-${image.id}`);
        const downloadBtn = document.getElementById(`download-btn-${image.id}`);

        progressEl.classList.add('hidden');
        errorEl.classList.add('hidden');

        if (image.status === 'compressing') {
            progressEl.classList.remove('hidden');
        } else if (image.status === 'done' && image.compressedSize !== null) {
            const compressedDimensions = image.compressedWidth && image.compressedHeight
                ? ` (${image.compressedWidth} × ${image.compressedHeight})`
                : '';

            arrowEl.classList.remove('hidden');
            compressedInfoEl.textContent = `${S.compressed}: ${formatFileSize(image.compressedSize)}${compressedDimensions}`;
            compressedInfoEl.classList.remove('hidden');
            savingsEl.textContent = `• ${calculateSavings(image.originalSize, image.compressedSize)}% ${S.smaller}`;
            savingsEl.classList.remove('hidden');
            downloadBtn.disabled = false;
        } else if (image.status === 'error') {
            errorEl.classList.remove('hidden');
        }
    }

    function removeImage(id) {
        images = images.filter(img => img.id !== id);
        const item = document.getElementById(`image-${id}`);
        if (item) item.remove();
        updateUI();
    }

    function clearAll() {
        images = [];
        imageList.innerHTML = '';
        updateUI();
    }

    function updateUI() {
        const hasImages = images.length > 0;
        imageQueue.classList.toggle('hidden', !hasImages);
        actionButtons.classList.toggle('hidden', !hasImages);

        const hasCompressed = images.some(img => img.compressedFile !== null);
        btnDownloadAll.disabled = !hasCompressed;

        updateButtonText();
        updateSummary();
    }

    function updateSummary() {
        const compressedImages = images.filter(img => img.compressedFile !== null);

        if (compressedImages.length === 0) {
            summaryStats.classList.add('hidden');
            return;
        }

        summaryStats.classList.remove('hidden');

        const totalOriginal = compressedImages.reduce((sum, img) => sum + img.originalSize, 0);
        const totalCompressed = compressedImages.reduce((sum, img) => sum + img.compressedSize, 0);
        const totalSavings = calculateSavings(totalOriginal, totalCompressed);

        statTotalImages.textContent = compressedImages.length;
        statOriginalSize.textContent = formatFileSize(totalOriginal);
        statCompressedSize.textContent = formatFileSize(totalCompressed);
        statTotalSavings.textContent = `${totalSavings}%`;
    }

    // ===== Compression Functions =====

    async function compressImage(imageObj) {
        const quality = parseInt(qualitySlider.value) / 100;
        const maxWidth = parseInt(maxWidthInput.value) || undefined;
        const maxHeight = parseInt(maxHeightInput.value) || undefined;
        const outputFormat = outputFormatSelect.value;

        const options = {
            maxSizeMB: 10,
            useWebWorker: true,
            initialQuality: quality,
        };

        // Set max dimensions
        if (maxWidth || maxHeight) {
            options.maxWidthOrHeight = Math.max(maxWidth || 0, maxHeight || 0);
        }

        // Set file type if converting
        if (outputFormat !== 'original') {
            options.fileType = outputFormat;
        }

        imageObj.status = 'compressing';
        updateImageItem(imageObj);

        try {
            const compressedFile = await imageCompression(imageObj.originalFile, options);
            imageObj.compressedFile = compressedFile;
            imageObj.compressedSize = compressedFile.size;

            // Get compressed dimensions
            const compressedDimensions = await getImageDimensions(compressedFile);
            imageObj.compressedWidth = compressedDimensions.width;
            imageObj.compressedHeight = compressedDimensions.height;

            imageObj.status = 'done';
        } catch (error) {
            console.error('Compression error:', error);
            imageObj.status = 'error';
        }

        updateImageItem(imageObj);
    }

    async function compressAll() {
        const pendingImages = images.filter(img => img.status === 'pending' || img.status === 'error');

        if (pendingImages.length === 0) {
            showSuccess(S.allAlreadyCompressed);
            return;
        }

        btnCompressAll.disabled = true;
        const originalText = compressText.textContent;
        btnCompressAll.innerHTML = `
            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>${S.compressing}</span>
        `;

        for (const imageObj of pendingImages) {
            await compressImage(imageObj);
        }

        btnCompressAll.disabled = false;
        btnCompressAll.innerHTML = `
            <svg id="compress-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            <span id="compress-text">${originalText}</span>
        `;

        updateUI();

        const successful = images.filter(img => img.status === 'done').length;
        const failed = images.filter(img => img.status === 'error').length;

        if (failed > 0) {
            showError(S.compressedWithErrors.replace('{success}', successful).replace('{failed}', failed));
        } else {
            const tmpl = successful === 1 ? S.successCompressedOne : S.successCompressedMany;
            showSuccess(tmpl.replace('{count}', successful));
        }
    }

    // ===== Download Functions =====

    function downloadSingle(id) {
        const imageObj = images.find(img => img.id === id);
        if (!imageObj || !imageObj.compressedFile) return;

        const outputFormat = outputFormatSelect.value;
        let fileName = imageObj.file.name;

        // Update extension if format changed
        if (outputFormat !== 'original') {
            const baseName = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;
            fileName = baseName + getFileExtension(outputFormat);
        }

        saveAs(imageObj.compressedFile, fileName);
        showSuccess(S.downloaded.replace('{filename}', fileName));
    }

    async function downloadAll() {
        const compressedImages = images.filter(img => img.compressedFile !== null);

        if (compressedImages.length === 0) {
            showError(S.noCompressedToDownload);
            return;
        }

        // If only one image, download directly without ZIP
        if (compressedImages.length === 1) {
            downloadSingle(compressedImages[0].id);
            return;
        }

        // Multiple images - create ZIP
        btnDownloadAll.disabled = true;
        const originalText = downloadText.textContent;
        btnDownloadAll.innerHTML = `
            <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>${S.creatingZip}</span>
        `;

        try {
            const zip = new JSZip();
            const outputFormat = outputFormatSelect.value;

            for (const imageObj of compressedImages) {
                let fileName = imageObj.file.name;

                // Update extension if format changed
                if (outputFormat !== 'original') {
                    const baseName = fileName.substring(0, fileName.lastIndexOf('.')) || fileName;
                    fileName = baseName + getFileExtension(outputFormat);
                }

                zip.file(fileName, imageObj.compressedFile);
            }

            const content = await zip.generateAsync({ type: 'blob' });
            const today = new Date();
            const dateStr = today.toISOString().split('T')[0];
            saveAs(content, `compressed-${dateStr}.zip`);
            showSuccess(S.downloadedZip.replace('{count}', compressedImages.length));
        } catch (error) {
            console.error('ZIP error:', error);
            showError(S.zipFailed);
        }

        btnDownloadAll.disabled = false;
        btnDownloadAll.innerHTML = `
            <svg id="download-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
            <span id="download-text">${originalText}</span>
        `;
    }

    // ===== Event Listeners =====

    // Quality slider
    qualitySlider.addEventListener('input', function() {
        qualityValue.textContent = this.value + '%';
        updatePresetActiveState();
    });

    qualitySlider.addEventListener('change', saveSettings);

    // Preset buttons
    presetButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            setQualityPreset(parseInt(this.dataset.quality));
        });
    });

    // Settings change listeners
    maxWidthInput.addEventListener('change', saveSettings);
    maxHeightInput.addEventListener('change', saveSettings);
    outputFormatSelect.addEventListener('change', saveSettings);
    autoCompressCheckbox.addEventListener('change', saveSettings);

    // Drop zone click
    dropZone.addEventListener('click', () => fileInput.click());

    // File input change
    fileInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                addImageToQueue(file);
            }
        });
        this.value = ''; // Reset input
    });

    // Drag and drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropZone.classList.add('border-gold', 'bg-gold/10', 'scale-[1.02]');
        dropZone.classList.remove('border-gold/30');
        dropZoneText.textContent = S.dropHere;
    }

    function unhighlight() {
        dropZone.classList.remove('border-gold', 'bg-gold/10', 'scale-[1.02]');
        dropZone.classList.add('border-gold/30');
        dropZoneText.textContent = S.dropText;
    }

    dropZone.addEventListener('drop', function(e) {
        const files = Array.from(e.dataTransfer.files);
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                addImageToQueue(file);
            }
        });
    });

    // Paste from clipboard
    document.addEventListener('paste', async function(e) {
        const items = e.clipboardData?.items;
        if (!items) return;

        for (const item of items) {
            if (item.type.startsWith('image/')) {
                e.preventDefault();
                const file = item.getAsFile();
                if (file) {
                    // Generate a filename since clipboard images don't have one
                    const extension = item.type.split('/')[1] || 'png';
                    const timestamp = new Date().toISOString().slice(0, 19).replace(/[:-]/g, '');
                    const namedFile = new File([file], `pasted-image-${timestamp}.${extension}`, {
                        type: file.type
                    });
                    addImageToQueue(namedFile);
                    showSuccess(S.pastedFromClipboard);
                }
            }
        }
    });

    // Action buttons
    btnCompressAll.addEventListener('click', compressAll);
    btnDownloadAll.addEventListener('click', downloadAll);
    btnClearAll.addEventListener('click', clearAll);

    // Initialize
    loadSettings();
    updatePresetActiveState();
})();
</script>
