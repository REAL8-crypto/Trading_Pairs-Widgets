document.addEventListener('DOMContentLoaded', function() {
    function addIconsToSelect(selectId) {
        const selectElement = document.getElementById(selectId);
        const options = selectElement.options;

        for (let i = 0; i < options.length; i++) {
            const option = options[i];
            const iconUrl = option.getAttribute('data-icon');
            if (iconUrl) {
                const icon = document.createElement('img');
                icon.src = iconUrl;
                icon.style.width = '20px';
                icon.style.height = '20px';
                icon.style.marginRight = '10px';

                const text = document.createTextNode(option.text);

                const optionContent = document.createElement('div');
                optionContent.appendChild(icon);
                optionContent.appendChild(text);

                option.innerHTML = '';
                option.appendChild(optionContent);
            }
        }
    }

    addIconsToSelect('buy-select');
    addIconsToSelect('sell-select');
});
