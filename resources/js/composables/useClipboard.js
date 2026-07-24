import { ref } from 'vue';

export function useClipboard() {
    const copied = ref(false);
    let supported = navigator && 'clipboard' in navigator;

    const copy = (text) => {
        if (supported) {
            navigator.clipboard.writeText(text);

            copied.value = true;

            return;
        }

        alert(
            'Apologies, your browser does not support clipboard operations. Please copy the code manually:',
        );
    };

    return { copy, copied, supported }
}