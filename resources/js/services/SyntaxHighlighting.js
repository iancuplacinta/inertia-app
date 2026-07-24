import hljs from 'highlight.js/lib/core';
import javascript from 'highlight.js/lib/languages/javascript';
import php from 'highlight.js/lib/languages/php';
import html from 'highlight.js/lib/languages/xml';
import yaml from 'highlight.js/lib/languages/yaml';
import 'highlight.js/styles/github-dark.css';

hljs.registerLanguage("javascript", javascript)
hljs.registerLanguage("php", php)
hljs.registerLanguage("html", html)
hljs.registerLanguage("yaml", yaml)


export const highlightElement = (element) => hljs.highlightElement(element);

export const highlight = (selector) => {
    if (!selector) {
        hljs.highlightAll();

        return;
    }

    document.querySelectorAll(selector + ' pre code').forEach(element => highlightElement(element))
}
