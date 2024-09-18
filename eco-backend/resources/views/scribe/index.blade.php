<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.37.2.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.37.2.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETsanctum-csrf-cookie">
                                <a href="#endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETup">
                                <a href="#endpoints-GETup">GET up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET-">
                                <a href="#endpoints-GET-">GET /</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETauth-validate">
                                <a href="#endpoints-GETauth-validate">GET auth/validate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GEToauth-yandex">
                                <a href="#endpoints-GEToauth-yandex">GET oauth/yandex</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GEToauth-yandex-login">
                                <a href="#endpoints-GEToauth-yandex-login">GET oauth/yandex/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-client-auth-register">
                                <a href="#endpoints-POSTapi-v1-client-auth-register">POST api/v1/client/auth/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-client-auth-login">
                                <a href="#endpoints-POSTapi-v1-client-auth-login">POST api/v1/client/auth/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-client-user">
                                <a href="#endpoints-GETapi-v1-client-user">GET api/v1/client/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-client-user">
                                <a href="#endpoints-PUTapi-v1-client-user">PUT api/v1/client/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-v1-client-user-password">
                                <a href="#endpoints-PATCHapi-v1-client-user-password">PATCH api/v1/client/user/password</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 15, 2024</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETsanctum-csrf-cookie">Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>

<p>
</p>



<span id="example-requests-GETsanctum-csrf-cookie">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/sanctum/csrf-cookie" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/sanctum/csrf-cookie"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsanctum-csrf-cookie">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
access-control-allow-origin: *
set-cookie: XSRF-TOKEN=eyJpdiI6IitGN2M0NE5IbUNwNU9WWlVFZnJabWc9PSIsInZhbHVlIjoiS0NoVHpETy9tTk9CNWI3WitVWUIvRjMyN0JINEtUcXIwRHZLVWd4VjNJbGxUTm9DZnN5ckZGaHVISUtidXpvRVdBcTl6aldhR3B6QlNCRkhBTFc1ZW9XS25yL1FQTW00NkVnT21WME5aQmtUZTlLT1NEU01zSk4wMVFNY244K3oiLCJtYWMiOiI4ZjM2ODFhZmI1NDA3NTBmMDEwOTdkNjQ1ZTA0ODI5MjI5MWQzZWFiYTFmOGVmYzUyMTA5NDcwZjEyNjFmYTIwIiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InNvN3NLZ2RBaU5pU0hjeFVhK1pDV3c9PSIsInZhbHVlIjoiSENBUlVBbXVJdHNBNjlzWjhpbW9BRnpQemwxbnIxWTZpQTlMM1Q0UWRqRnFEeFQvTGJVb1NpcGZMOWVNUFg2NTE0UnVRVy9DOFc2TE4zNytIaXVsb1pNU3VuRUFLTjdDOC9KZ1JKcXFhZCtoMXlhQ0NjL3M3UmJGSldyaUxmU3EiLCJtYWMiOiI3YjU0MTQyMTFlNTc0NjUzZjAwZjRlYTRlNzkzNzJmMjc5MTgxM2FjNjgxM2I2M2FmMDQ1Y2QyMWQ1YmQwZGU5IiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>
<code>Empty response</code>
 </pre>
    </span>
<span id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsanctum-csrf-cookie"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsanctum-csrf-cookie" data-method="GET"
      data-path="sanctum/csrf-cookie"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsanctum-csrf-cookie"
                    onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsanctum-csrf-cookie"
                    onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsanctum-csrf-cookie"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>sanctum/csrf-cookie</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsanctum-csrf-cookie"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsanctum-csrf-cookie"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETup">GET up</h2>

<p>
</p>



<span id="example-requests-GETup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/up" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/up"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETup">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Styles --&gt;
        &lt;script src=&quot;https://cdn.tailwindcss.com&quot;&gt;&lt;/script&gt;

        &lt;script&gt;
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: [&#039;Figtree&#039;, &#039;ui-sans-serif&#039;, &#039;system-ui&#039;, &#039;sans-serif&#039;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;],
                        }
                    }
                }
            }
        &lt;/script&gt;
    &lt;/head&gt;
    &lt;body class=&quot;antialiased&quot;&gt;
        &lt;div class=&quot;relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 selection:bg-red-500 selection:text-white&quot;&gt;
            &lt;div class=&quot;w-full sm:w-3/4 xl:w-1/2 mx-auto p-6&quot;&gt;
                &lt;div class=&quot;px-6 py-4 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex items-center focus:outline focus:outline-2 focus:outline-red-500&quot;&gt;
                    &lt;div class=&quot;relative flex h-3 w-3&quot;&gt;
                      &lt;span class=&quot;animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75&quot;&gt;&lt;/span&gt;
                      &lt;span class=&quot;relative inline-flex rounded-full h-3 w-3 bg-green-400&quot;&gt;&lt;/span&gt;
                    &lt;/div&gt;

                    &lt;div class=&quot;ml-6&quot;&gt;
                        &lt;h2 class=&quot;text-xl font-semibold text-gray-900&quot;&gt;Application up&lt;/h2&gt;

                        &lt;p class=&quot;mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed&quot;&gt;
                            HTTP request received.

                                                            Response successfully rendered in 759ms.
                                                    &lt;/p&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETup"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETup">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETup" data-method="GET"
      data-path="up"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETup"
                    onclick="tryItOut('GETup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETup"
                    onclick="cancelTryOut('GETup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETup"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>up</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GET-">GET /</h2>

<p>
</p>



<span id="example-requests-GET-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IkRWWlFJN25ncVpkbHNSVzM3YWpsU1E9PSIsInZhbHVlIjoiek81dXh5cHhQejJ6eHVHVkpLb2ZTUkpqZ0J4U3RxT2JwQkVwbVhnUXhZWHBYRHhBVmFXaEcxOThidmVnbHdBU2JUbTBpWngzcUc1a3AyejhodXFiTlJDdkhmakVTYUFhM1BiK0xkUzRHUEg4KzNWZnNldnQ4M2VLcE1hOWR1N1ciLCJtYWMiOiJkMWFlYzA3MmZhZjQ4M2U0MjhlOTk3OTk4NDAxNmQzMmIyOWI1MjJmODJkZGE5N2YwZWVkMTc3MTBkZDc5MjEyIiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlVnR2pJNmtDVzVWaTNmbmZ2bHV4Znc9PSIsInZhbHVlIjoiRkN4RUNuS3dWZkpCbkJrV25lcUlOc0NEMU5iM09KRUNib1AxYWtLTmJVYVoyek9JbmhSZzR0NXRsbVdlMVFCNVlBUnVnOW5wMWhycnh5ZFZyVzdUVHROZGZqMm1kZzdEdHlSNFVRSWRydHFSZUozRzZUM3dTYWtuWFlSMUhJS1ciLCJtYWMiOiIzZjE2ZTM4YzBhNTc0YzkwMGFhZWUwZTI2NGMzZDAxNWNlZjQxOGNmNjQ0NGVjNjRlYTEzMTUyNWZlZTRhODU3IiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!doctype html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot;
          content=&quot;width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0&quot;&gt;
    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;ie=edge&quot;&gt;
    &lt;title&gt;ECO&lt;/title&gt;
&lt;/head&gt;
&lt;style&gt;
    .text-center {
        text-align: center;
    }
    .my-auto {
        margin-top: auto;
        margin-bottom: auto;
    }
    .w-screen {
        width: 100vw;
    }
    .h-screen {
        height: 100vh;
    }
&lt;/style&gt;
&lt;body&gt;
    &lt;p class=&quot;text-center my-auto w-screen h-screen&quot;&gt;Всем привет&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETauth-validate">GET auth/validate</h2>

<p>
</p>



<span id="example-requests-GETauth-validate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/auth/validate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"pariatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/auth/validate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "pariatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETauth-validate">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InFCNnRYYm9mUjhublovQUpkckovTGc9PSIsInZhbHVlIjoiTXMza1NDSGNlK2phK3hVbm4vUjFEZDM1TmFaL25jMitCMWJzOEhlTUhoRGJ5SzJRMGl4KzREcXh1azcycE9NOUxPZE8wbzhiWVBIWFY2cVJ0QlFsZC82SytDQWl6anFQc1NrTzNpL0dlTDJiYXpIbDNZL0JvREZyd2VuaVVreXMiLCJtYWMiOiIxYzY2MjEwODkxYThmZGZmOTA2ZGQxZDQ4OWUxNDdkOTdlNDY1MzVlOTgzZjk0NDFlNDZmZGYxMmUzMzdkNWM0IiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlB5ZjhoMVdVUFhSeGwwbEV1VUdXcEE9PSIsInZhbHVlIjoiVkxJVW90K3ZRc25PSHE0TXNJcDQ5RUFySmkrZXU5MDJBYWV5VHdPR21kYVFFV0dqU3FwR0pIem1jWjBteVBaOEU5YlBzZ3pydlNSK3ZEZTJuck15dUwyNjQ2eENIOXA1Tm9qNE90YS8wUThwaFdQNzRobVM3ald6WDBBd3RveDQiLCJtYWMiOiJlZTVmZGY2ZDNmMTAzMjkyYjAyODEyNDdmMTk1YjE1YzQyNGNkYmYxODY0YjRlY2Q4MDlkMjY3MGY0ZjcwZDc3IiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: false,
    &quot;message&quot;: &quot;Invalid token&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETauth-validate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETauth-validate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETauth-validate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETauth-validate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETauth-validate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETauth-validate" data-method="GET"
      data-path="auth/validate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETauth-validate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETauth-validate"
                    onclick="tryItOut('GETauth-validate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETauth-validate"
                    onclick="cancelTryOut('GETauth-validate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETauth-validate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>auth/validate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETauth-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETauth-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="GETauth-validate"
               value="pariatur"
               data-component="body">
    <br>
<p>Example: <code>pariatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GEToauth-yandex">GET oauth/yandex</h2>

<p>
</p>



<span id="example-requests-GEToauth-yandex">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/oauth/yandex" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/oauth/yandex"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GEToauth-yandex">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
location: https://oauth.yandex.ru/authorize?client_id=9baefde8ce044107a7e2aeb8808613c0&amp;redirect_uri=http%3A%2F%2Flocalhost%2Foauth%2Fyandex%2Flogin&amp;scope=&amp;response_type=code&amp;state=FRVyjEi28OpHML4mziBeDDZLRnnypKeiVRtZaj9m
content-type: text/html; charset=utf-8
set-cookie: XSRF-TOKEN=eyJpdiI6Ijd6TTNzby85WnJGUVFkUnZyQU05eEE9PSIsInZhbHVlIjoiT2FZY05ZREhhOWd1YjJUQy90YWJQd21TcXlVRWVLd2JCOGhzOC9ZdEZPajJKbXU3MDJJcldCcUpoS21lVGtuMnQxYlZSYVlMZ3liZG9yRVl0bmYwN20yb1hVTGhmTjVyRkdwZkFpRnd4VDliU251TDJCdEYzcE5ML0t4TC9hRzEiLCJtYWMiOiI2YmUzN2Y1MjdjYjRmMzVhMTMyN2M1MDdmZmZlN2E4OTMxZDM0Y2RiMzllYjFlYTlmNzU3MzJjYTI2YWY5MTBjIiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkNqbEJLWjVFWTg4SWdreFNZTmlMSXc9PSIsInZhbHVlIjoieng4N3FNV21UQ2dzME5wVVVSQm5BcDJGNTFGd2tZVG5QMytKTzg0aVRBVG5yL2dkUWtIM2RMUFpRV3k2dlBZOEYxbXlrN1VSZkZZZk5xbnNZNFRZZGw1ZG4rVCszSys0ZzlKVmh2L2d1Lzk4cWwzRmRPZXpnVGFrNkMzWndlYXIiLCJtYWMiOiIyMTQ5NzVjMDRhNzY2Mjc2NjA4MmY0MDc5MDk0MTY4NDlhMTMyOTMwZGMyMWIwMmNlODNiYTRkOGMzZTA2OGVjIiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;UTF-8&quot; /&gt;
        &lt;meta http-equiv=&quot;refresh&quot; content=&quot;0;url=&#039;https://oauth.yandex.ru/authorize?client_id=9baefde8ce044107a7e2aeb8808613c0&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%2Foauth%2Fyandex%2Flogin&amp;amp;scope=&amp;amp;response_type=code&amp;amp;state=FRVyjEi28OpHML4mziBeDDZLRnnypKeiVRtZaj9m&#039;&quot; /&gt;

        &lt;title&gt;Redirecting to https://oauth.yandex.ru/authorize?client_id=9baefde8ce044107a7e2aeb8808613c0&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%2Foauth%2Fyandex%2Flogin&amp;amp;scope=&amp;amp;response_type=code&amp;amp;state=FRVyjEi28OpHML4mziBeDDZLRnnypKeiVRtZaj9m&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        Redirecting to &lt;a href=&quot;https://oauth.yandex.ru/authorize?client_id=9baefde8ce044107a7e2aeb8808613c0&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%2Foauth%2Fyandex%2Flogin&amp;amp;scope=&amp;amp;response_type=code&amp;amp;state=FRVyjEi28OpHML4mziBeDDZLRnnypKeiVRtZaj9m&quot;&gt;https://oauth.yandex.ru/authorize?client_id=9baefde8ce044107a7e2aeb8808613c0&amp;amp;redirect_uri=http%3A%2F%2Flocalhost%2Foauth%2Fyandex%2Flogin&amp;amp;scope=&amp;amp;response_type=code&amp;amp;state=FRVyjEi28OpHML4mziBeDDZLRnnypKeiVRtZaj9m&lt;/a&gt;.
    &lt;/body&gt;
&lt;/html&gt;</code>
 </pre>
    </span>
<span id="execution-results-GEToauth-yandex" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GEToauth-yandex"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GEToauth-yandex"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GEToauth-yandex" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEToauth-yandex">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GEToauth-yandex" data-method="GET"
      data-path="oauth/yandex"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GEToauth-yandex', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GEToauth-yandex"
                    onclick="tryItOut('GEToauth-yandex');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GEToauth-yandex"
                    onclick="cancelTryOut('GEToauth-yandex');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GEToauth-yandex"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>oauth/yandex</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GEToauth-yandex"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GEToauth-yandex"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GEToauth-yandex-login">GET oauth/yandex/login</h2>

<p>
</p>



<span id="example-requests-GEToauth-yandex-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/oauth/yandex/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/oauth/yandex/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GEToauth-yandex-login">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InBuc1NwUjJzK1hpdHdZYnJZbTVDL3c9PSIsInZhbHVlIjoieTdQZkhJTERGQ3JlQzIrZW1DRndBT1F1ZW5JK01ROGVxUDI5OXAyc3FVei9IVkJjVHhnbk8yQ2dGdDZOTWxyYlNZYklWTTEyMU10dWw4TkNkYUp6TmxpenNNdHRFM21PMjRFNlRiSG9XcUt2dHBKVG53MENyZ24zcUtKclg0cUMiLCJtYWMiOiJlYjE3OGQ0Y2JiZTk2NjNiYmUzZmU3YTIzM2JmNTg0MzFmODZhYjUwZWQ0YzRiYmNmYmVjZTJiMzJmYjQ4N2I2IiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlAvVVkyZXdZU2hLWWs3VEpjNWhldnc9PSIsInZhbHVlIjoiZHBQNnRhSmQwTWp6NE1SQlpVUnUrYnVyZVpIUHpVYjcyaTR5WXZId1NuNENhRUt0OEZlVFJKSjF4MmNrZlB1aTNlbEVlSC8ySDJvQWNISzBkWlY3K2FjZEFzbGVhak1aT0hYS21lMHVVdVpDbHVyVlR5Nm9LUUNOOHZ2YXRvNXkiLCJtYWMiOiIwYzEzNWRkOGRhY2FmYjcwMDBkNDdjNmUyOGI0MWU4MTA1NWRhMzE5YzQ2YmQzODI4YWIxNDdjYzVjMTVkMDliIiwidGFnIjoiIn0%3D; expires=Sun, 15 Sep 2024 14:34:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GEToauth-yandex-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GEToauth-yandex-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GEToauth-yandex-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GEToauth-yandex-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEToauth-yandex-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GEToauth-yandex-login" data-method="GET"
      data-path="oauth/yandex/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GEToauth-yandex-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GEToauth-yandex-login"
                    onclick="tryItOut('GEToauth-yandex-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GEToauth-yandex-login"
                    onclick="cancelTryOut('GEToauth-yandex-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GEToauth-yandex-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>oauth/yandex/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GEToauth-yandex-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GEToauth-yandex-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-client-auth-register">POST api/v1/client/auth/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-client-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/client/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ohttmgvyvnngizcorq\",
    \"surname\": \"qmzkpgrkmzdwwznhqljqkpac\",
    \"email\": \"mraz.adrian@example.net\",
    \"password\": \"&amp;%E@@A6h4\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/client/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ohttmgvyvnngizcorq",
    "surname": "qmzkpgrkmzdwwznhqljqkpac",
    "email": "mraz.adrian@example.net",
    "password": "&amp;%E@@A6h4"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-client-auth-register">
</span>
<span id="execution-results-POSTapi-v1-client-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-client-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-client-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-client-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-client-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-client-auth-register" data-method="POST"
      data-path="api/v1/client/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-client-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-client-auth-register"
                    onclick="tryItOut('POSTapi-v1-client-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-client-auth-register"
                    onclick="cancelTryOut('POSTapi-v1-client-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-client-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/client/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-client-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-client-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-v1-client-auth-register"
               value="ohttmgvyvnngizcorq"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>ohttmgvyvnngizcorq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>surname</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="surname"                data-endpoint="POSTapi-v1-client-auth-register"
               value="qmzkpgrkmzdwwznhqljqkpac"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>qmzkpgrkmzdwwznhqljqkpac</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-client-auth-register"
               value="mraz.adrian@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>mraz.adrian@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-client-auth-register"
               value="&%E@@A6h4"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>&amp;%E@@A6h4</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-client-auth-login">POST api/v1/client/auth/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-client-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/client/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"champlin.rebecca@example.net\",
    \"password\": \"fDifa;#bhX(b\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/client/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "champlin.rebecca@example.net",
    "password": "fDifa;#bhX(b"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-client-auth-login">
</span>
<span id="execution-results-POSTapi-v1-client-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-client-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-client-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-client-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-client-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-client-auth-login" data-method="POST"
      data-path="api/v1/client/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-client-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-client-auth-login"
                    onclick="tryItOut('POSTapi-v1-client-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-client-auth-login"
                    onclick="cancelTryOut('POSTapi-v1-client-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-client-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/client/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-client-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-client-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-client-auth-login"
               value="champlin.rebecca@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>champlin.rebecca@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-client-auth-login"
               value="fDifa;#bhX(b"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>fDifa;#bhX(b</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-client-user">GET api/v1/client/user</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-client-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/client/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/client/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-client-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-client-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-client-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-client-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-client-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-client-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-client-user" data-method="GET"
      data-path="api/v1/client/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-client-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-client-user"
                    onclick="tryItOut('GETapi-v1-client-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-client-user"
                    onclick="cancelTryOut('GETapi-v1-client-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-client-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/client/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-client-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-client-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-v1-client-user">PUT api/v1/client/user</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-client-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/v1/client/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"hsg\",
    \"surname\": \"iohl\",
    \"gender\": \"male\",
    \"birthdate\": \"2024-09-15\",
    \"address\": \"forlxgucrjt\",
    \"about\": \"mjbr\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/client/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "hsg",
    "surname": "iohl",
    "gender": "male",
    "birthdate": "2024-09-15",
    "address": "forlxgucrjt",
    "about": "mjbr"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-client-user">
</span>
<span id="execution-results-PUTapi-v1-client-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-client-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-client-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-client-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-client-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-client-user" data-method="PUT"
      data-path="api/v1/client/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-client-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-client-user"
                    onclick="tryItOut('PUTapi-v1-client-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-client-user"
                    onclick="cancelTryOut('PUTapi-v1-client-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-client-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/client/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-client-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-client-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-v1-client-user"
               value="hsg"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>hsg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>surname</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="surname"                data-endpoint="PUTapi-v1-client-user"
               value="iohl"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>iohl</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="PUTapi-v1-client-user"
               value="male"
               data-component="body">
    <br>
<p>Example: <code>male</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>male</code></li> <li><code>female</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birthdate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="birthdate"                data-endpoint="PUTapi-v1-client-user"
               value="2024-09-15"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2024-09-15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-client-user"
               value="forlxgucrjt"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>forlxgucrjt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>about</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="about"                data-endpoint="PUTapi-v1-client-user"
               value="mjbr"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>mjbr</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PATCHapi-v1-client-user-password">PATCH api/v1/client/user/password</h2>

<p>
</p>



<span id="example-requests-PATCHapi-v1-client-user-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/client/user/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"old_password\": \"hfkbttcuvplsc\",
    \"new_password\": \"ulolxvnnhybteiud\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/client/user/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "hfkbttcuvplsc",
    "new_password": "ulolxvnnhybteiud"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-client-user-password">
</span>
<span id="execution-results-PATCHapi-v1-client-user-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-client-user-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-client-user-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-client-user-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-client-user-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-client-user-password" data-method="PATCH"
      data-path="api/v1/client/user/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-client-user-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-client-user-password"
                    onclick="tryItOut('PATCHapi-v1-client-user-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-client-user-password"
                    onclick="cancelTryOut('PATCHapi-v1-client-user-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-client-user-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/client/user/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-client-user-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-v1-client-user-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>old_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="old_password"                data-endpoint="PATCHapi-v1-client-user-password"
               value="hfkbttcuvplsc"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>hfkbttcuvplsc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="PATCHapi-v1-client-user-password"
               value="ulolxvnnhybteiud"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>ulolxvnnhybteiud</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
