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
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-posts">
                                <a href="#endpoints-GETapi-v1-posts">GET api/v1/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-posts-comment">
                                <a href="#endpoints-POSTapi-v1-posts-comment">POST api/v1/posts/comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-posts-reply">
                                <a href="#endpoints-POSTapi-v1-posts-reply">POST api/v1/posts/reply</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-videos">
                                <a href="#endpoints-GETapi-v1-videos">GET api/v1/videos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-videos-comment">
                                <a href="#endpoints-POSTapi-v1-videos-comment">POST api/v1/videos/comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-videos-reply">
                                <a href="#endpoints-POSTapi-v1-videos-reply">POST api/v1/videos/reply</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-notes">
                                <a href="#endpoints-GETapi-v1-notes">GET api/v1/notes</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-notes-comment">
                                <a href="#endpoints-POSTapi-v1-notes-comment">POST api/v1/notes/comment</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-notes-reply">
                                <a href="#endpoints-POSTapi-v1-notes-reply">POST api/v1/notes/reply</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-reaction">
                                <a href="#endpoints-POSTapi-v1-reaction">POST api/v1/reaction</a>
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
        <li>Last updated: September 18, 2024</li>
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

    

                                <h2 id="endpoints-GETapi-v1-posts">GET api/v1/posts</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first\": 21,
    \"page\": 67,
    \"post_id\": \"aut\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first": 21,
    "page": 67,
    "post_id": "aut"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts">
            <blockquote>
            <p>Example response (422):</p>
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
    &quot;message&quot;: &quot;The post id field must be a valid ULID.&quot;,
    &quot;errors&quot;: {
        &quot;post_id&quot;: [
            &quot;The post id field must be a valid ULID.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-posts" data-method="GET"
      data-path="api/v1/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts"
                    onclick="tryItOut('GETapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts"
                    onclick="cancelTryOut('GETapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-posts"
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
                              name="Accept"                data-endpoint="GETapi-v1-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="first"                data-endpoint="GETapi-v1-posts"
               value="21"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 30. Example: <code>21</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-posts"
               value="67"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>67</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post_id"                data-endpoint="GETapi-v1-posts"
               value="aut"
               data-component="body">
    <br>
<p>Example: <code>aut</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-posts-comment">POST api/v1/posts/comment</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-posts-comment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/posts/comment" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment\": \"xumwfoyyzwaqakwaddmdzzydy\",
    \"post_id\": \"aliquid\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/comment"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment": "xumwfoyyzwaqakwaddmdzzydy",
    "post_id": "aliquid"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts-comment">
</span>
<span id="execution-results-POSTapi-v1-posts-comment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts-comment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts-comment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts-comment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts-comment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-posts-comment" data-method="POST"
      data-path="api/v1/posts/comment"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts-comment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts-comment"
                    onclick="tryItOut('POSTapi-v1-posts-comment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts-comment"
                    onclick="cancelTryOut('POSTapi-v1-posts-comment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts-comment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/comment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-posts-comment"
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
                              name="Accept"                data-endpoint="POSTapi-v1-posts-comment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-v1-posts-comment"
               value="xumwfoyyzwaqakwaddmdzzydy"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>xumwfoyyzwaqakwaddmdzzydy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post_id"                data-endpoint="POSTapi-v1-posts-comment"
               value="aliquid"
               data-component="body">
    <br>
<p>Example: <code>aliquid</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-posts-reply">POST api/v1/posts/reply</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-posts-reply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/posts/reply" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"post_comment_id\": \"mollitia\",
    \"comment\": \"cwvhgdvxyhijikb\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/posts/reply"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "post_comment_id": "mollitia",
    "comment": "cwvhgdvxyhijikb"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts-reply">
</span>
<span id="execution-results-POSTapi-v1-posts-reply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts-reply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts-reply"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts-reply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts-reply">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-posts-reply" data-method="POST"
      data-path="api/v1/posts/reply"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts-reply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts-reply"
                    onclick="tryItOut('POSTapi-v1-posts-reply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts-reply"
                    onclick="cancelTryOut('POSTapi-v1-posts-reply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts-reply"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/reply</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-posts-reply"
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
                              name="Accept"                data-endpoint="POSTapi-v1-posts-reply"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>post_comment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="post_comment_id"                data-endpoint="POSTapi-v1-posts-reply"
               value="mollitia"
               data-component="body">
    <br>
<p>Example: <code>mollitia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-v1-posts-reply"
               value="cwvhgdvxyhijikb"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>cwvhgdvxyhijikb</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-videos">GET api/v1/videos</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-videos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/videos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first\": 12,
    \"page\": 85,
    \"video_id\": \"maiores\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/videos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first": 12,
    "page": 85,
    "video_id": "maiores"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-videos">
            <blockquote>
            <p>Example response (422):</p>
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
    &quot;message&quot;: &quot;The video id field must be a valid ULID.&quot;,
    &quot;errors&quot;: {
        &quot;video_id&quot;: [
            &quot;The video id field must be a valid ULID.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-videos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-videos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-videos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-videos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-videos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-videos" data-method="GET"
      data-path="api/v1/videos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-videos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-videos"
                    onclick="tryItOut('GETapi-v1-videos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-videos"
                    onclick="cancelTryOut('GETapi-v1-videos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-videos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/videos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-videos"
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
                              name="Accept"                data-endpoint="GETapi-v1-videos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="first"                data-endpoint="GETapi-v1-videos"
               value="12"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 30. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-videos"
               value="85"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>85</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>video_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="video_id"                data-endpoint="GETapi-v1-videos"
               value="maiores"
               data-component="body">
    <br>
<p>Example: <code>maiores</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-videos-comment">POST api/v1/videos/comment</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-videos-comment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/videos/comment" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment\": \"vrcuhtanjmxphitubati\",
    \"video_id\": \"omnis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/videos/comment"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment": "vrcuhtanjmxphitubati",
    "video_id": "omnis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-videos-comment">
</span>
<span id="execution-results-POSTapi-v1-videos-comment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-videos-comment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-videos-comment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-videos-comment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-videos-comment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-videos-comment" data-method="POST"
      data-path="api/v1/videos/comment"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-videos-comment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-videos-comment"
                    onclick="tryItOut('POSTapi-v1-videos-comment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-videos-comment"
                    onclick="cancelTryOut('POSTapi-v1-videos-comment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-videos-comment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/videos/comment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-videos-comment"
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
                              name="Accept"                data-endpoint="POSTapi-v1-videos-comment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-v1-videos-comment"
               value="vrcuhtanjmxphitubati"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vrcuhtanjmxphitubati</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>video_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="video_id"                data-endpoint="POSTapi-v1-videos-comment"
               value="omnis"
               data-component="body">
    <br>
<p>Example: <code>omnis</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-videos-reply">POST api/v1/videos/reply</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-videos-reply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/videos/reply" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"video_comment_id\": \"eveniet\",
    \"comment\": \"ositd\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/videos/reply"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "video_comment_id": "eveniet",
    "comment": "ositd"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-videos-reply">
</span>
<span id="execution-results-POSTapi-v1-videos-reply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-videos-reply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-videos-reply"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-videos-reply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-videos-reply">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-videos-reply" data-method="POST"
      data-path="api/v1/videos/reply"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-videos-reply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-videos-reply"
                    onclick="tryItOut('POSTapi-v1-videos-reply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-videos-reply"
                    onclick="cancelTryOut('POSTapi-v1-videos-reply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-videos-reply"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/videos/reply</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-videos-reply"
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
                              name="Accept"                data-endpoint="POSTapi-v1-videos-reply"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>video_comment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="video_comment_id"                data-endpoint="POSTapi-v1-videos-reply"
               value="eveniet"
               data-component="body">
    <br>
<p>Example: <code>eveniet</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-v1-videos-reply"
               value="ositd"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ositd</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-notes">GET api/v1/notes</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-notes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/notes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first\": 16,
    \"page\": 59,
    \"note_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/notes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first": 16,
    "page": 59,
    "note_id": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-notes">
            <blockquote>
            <p>Example response (422):</p>
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
    &quot;message&quot;: &quot;The note id field must be a valid ULID.&quot;,
    &quot;errors&quot;: {
        &quot;note_id&quot;: [
            &quot;The note id field must be a valid ULID.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-notes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-notes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-notes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-notes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-notes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-notes" data-method="GET"
      data-path="api/v1/notes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-notes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-notes"
                    onclick="tryItOut('GETapi-v1-notes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-notes"
                    onclick="cancelTryOut('GETapi-v1-notes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-notes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/notes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-notes"
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
                              name="Accept"                data-endpoint="GETapi-v1-notes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="first"                data-endpoint="GETapi-v1-notes"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 30. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-v1-notes"
               value="59"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>59</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_id"                data-endpoint="GETapi-v1-notes"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-notes-comment">POST api/v1/notes/comment</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-notes-comment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/notes/comment" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"comment\": \"gkxbfxuaeevhqjgketllz\",
    \"note_id\": \"nobis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/notes/comment"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment": "gkxbfxuaeevhqjgketllz",
    "note_id": "nobis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-notes-comment">
</span>
<span id="execution-results-POSTapi-v1-notes-comment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-notes-comment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-notes-comment"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-notes-comment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-notes-comment">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-notes-comment" data-method="POST"
      data-path="api/v1/notes/comment"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-notes-comment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-notes-comment"
                    onclick="tryItOut('POSTapi-v1-notes-comment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-notes-comment"
                    onclick="cancelTryOut('POSTapi-v1-notes-comment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-notes-comment"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/notes/comment</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-notes-comment"
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
                              name="Accept"                data-endpoint="POSTapi-v1-notes-comment"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-v1-notes-comment"
               value="gkxbfxuaeevhqjgketllz"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>gkxbfxuaeevhqjgketllz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_id"                data-endpoint="POSTapi-v1-notes-comment"
               value="nobis"
               data-component="body">
    <br>
<p>Example: <code>nobis</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-notes-reply">POST api/v1/notes/reply</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-notes-reply">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/notes/reply" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"note_comment_id\": \"veritatis\",
    \"comment\": \"wiu\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/notes/reply"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "note_comment_id": "veritatis",
    "comment": "wiu"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-notes-reply">
</span>
<span id="execution-results-POSTapi-v1-notes-reply" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-notes-reply"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-notes-reply"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-notes-reply" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-notes-reply">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-notes-reply" data-method="POST"
      data-path="api/v1/notes/reply"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-notes-reply', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-notes-reply"
                    onclick="tryItOut('POSTapi-v1-notes-reply');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-notes-reply"
                    onclick="cancelTryOut('POSTapi-v1-notes-reply');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-notes-reply"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/notes/reply</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-notes-reply"
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
                              name="Accept"                data-endpoint="POSTapi-v1-notes-reply"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>note_comment_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="note_comment_id"                data-endpoint="POSTapi-v1-notes-reply"
               value="veritatis"
               data-component="body">
    <br>
<p>Example: <code>veritatis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comment</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="comment"                data-endpoint="POSTapi-v1-notes-reply"
               value="wiu"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>wiu</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-v1-reaction">POST api/v1/reaction</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-reaction">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/reaction" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"type\": \"note_comment\",
    \"id\": \"voluptatem\",
    \"reaction_type\": \"dislike\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/reaction"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "type": "note_comment",
    "id": "voluptatem",
    "reaction_type": "dislike"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-reaction">
</span>
<span id="execution-results-POSTapi-v1-reaction" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-reaction"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-reaction"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-reaction" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-reaction">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-reaction" data-method="POST"
      data-path="api/v1/reaction"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-reaction', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-reaction"
                    onclick="tryItOut('POSTapi-v1-reaction');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-reaction"
                    onclick="cancelTryOut('POSTapi-v1-reaction');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-reaction"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/reaction</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-reaction"
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
                              name="Accept"                data-endpoint="POSTapi-v1-reaction"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-v1-reaction"
               value="note_comment"
               data-component="body">
    <br>
<p>Example: <code>note_comment</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>post_comment</code></li> <li><code>video_comment</code></li> <li><code>post_comment_reply</code></li> <li><code>video_comment_reply</code></li> <li><code>note_comment</code></li> <li><code>note_comment_reply</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-v1-reaction"
               value="voluptatem"
               data-component="body">
    <br>
<p>Example: <code>voluptatem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>reaction_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reaction_type"                data-endpoint="POSTapi-v1-reaction"
               value="dislike"
               data-component="body">
    <br>
<p>Example: <code>dislike</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>like</code></li> <li><code>dislike</code></li></ul>
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
