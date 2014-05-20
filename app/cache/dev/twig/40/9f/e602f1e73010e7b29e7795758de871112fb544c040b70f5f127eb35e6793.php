<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_409fe602f1e73010e7b29e7795758de871112fb544c040b70f5f127eb35e6793 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                options.maxTries = options.maxTries || 0;
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 !== xhr.readyState) {
                        return null;
                    }

                    if (xhr.status == 404 && options.maxTries > 1) {
                        setTimeout(function(){
                            options.maxTries--;
                            request(url, onSuccess, onError, payload, options);
                        }, 500);

                        return null;
                    }

                    if (200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        '',
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  83 => 30,  29 => 4,  38 => 13,  35 => 7,  26 => 3,  87 => 20,  21 => 2,  94 => 22,  92 => 21,  89 => 20,  75 => 28,  72 => 16,  68 => 14,  64 => 12,  50 => 15,  24 => 2,  199 => 91,  196 => 90,  183 => 82,  173 => 74,  171 => 73,  166 => 71,  163 => 70,  158 => 67,  151 => 63,  142 => 59,  138 => 57,  136 => 56,  133 => 55,  123 => 47,  121 => 46,  117 => 44,  112 => 42,  105 => 40,  101 => 24,  91 => 35,  86 => 28,  69 => 25,  66 => 25,  51 => 15,  39 => 6,  19 => 1,  93 => 9,  80 => 19,  78 => 40,  46 => 14,  32 => 6,  27 => 4,  22 => 2,  57 => 16,  54 => 21,  43 => 8,  33 => 6,  30 => 5,  311 => 123,  307 => 115,  300 => 111,  296 => 110,  292 => 108,  284 => 103,  280 => 102,  276 => 100,  274 => 99,  271 => 98,  268 => 97,  261 => 119,  256 => 116,  254 => 97,  251 => 96,  244 => 92,  240 => 91,  236 => 90,  231 => 87,  229 => 86,  217 => 76,  211 => 72,  209 => 71,  201 => 92,  191 => 58,  187 => 84,  177 => 50,  172 => 48,  168 => 72,  164 => 46,  160 => 45,  156 => 66,  152 => 43,  148 => 42,  144 => 41,  137 => 36,  135 => 35,  130 => 33,  125 => 30,  122 => 29,  115 => 43,  109 => 23,  107 => 22,  103 => 21,  98 => 40,  95 => 19,  88 => 6,  84 => 13,  79 => 29,  76 => 11,  70 => 26,  58 => 124,  55 => 13,  53 => 29,  49 => 19,  47 => 19,  42 => 12,  40 => 8,  36 => 7,  25 => 3,  85 => 19,  74 => 15,  67 => 13,  62 => 24,  56 => 9,  52 => 9,  48 => 8,  44 => 10,  41 => 9,  37 => 5,  31 => 5,  28 => 2,);
    }
}
