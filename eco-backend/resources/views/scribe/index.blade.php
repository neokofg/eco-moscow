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
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-client-auth-register">
                                <a href="#endpoints-POSTapi-v1-client-auth-register">POST api/v1/client/auth/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-client-auth-login">
                                <a href="#endpoints-POSTapi-v1-client-auth-login">POST api/v1/client/auth/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-v1-client-user">
                                <a href="#endpoints-PUTapi-v1-client-user">PUT api/v1/client/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-v1-client-user-password">
                                <a href="#endpoints-PATCHapi-v1-client-user-password">PATCH api/v1/client/user/password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-v1-client-user-email">
                                <a href="#endpoints-PATCHapi-v1-client-user-email">PATCH api/v1/client/user/email</a>
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
    \"name\": \"rcp\",
    \"surname\": \"zeo\",
    \"email\": \"oral.medhurst@example.com\",
    \"password\": \"ikJisR4Acl6#7@\'5vc\"
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
    "name": "rcp",
    "surname": "zeo",
    "email": "oral.medhurst@example.com",
    "password": "ikJisR4Acl6#7@'5vc"
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
               value="rcp"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>rcp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>surname</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="surname"                data-endpoint="POSTapi-v1-client-auth-register"
               value="zeo"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>zeo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-client-auth-register"
               value="oral.medhurst@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>oral.medhurst@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-client-auth-register"
               value="ikJisR4Acl6#7@'5vc"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>ikJisR4Acl6#7@'5vc</code></p>
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
    \"email\": \"roxane.breitenberg@example.com\",
    \"password\": \"7H[fbWut\"
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
    "email": "roxane.breitenberg@example.com",
    "password": "7H[fbWut"
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
               value="roxane.breitenberg@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>roxane.breitenberg@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-v1-client-auth-login"
               value="7H[fbWut"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>7H[fbWut</code></p>
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
    \"name\": \"lqyyxgraihbcwgfxicn\",
    \"surname\": \"vmphjllnlyfaxbo\",
    \"gender\": \"male\",
    \"birthdate\": \"2024-09-18\",
    \"address\": \"viqhssgcdzgxafbreenzqw\",
    \"about\": \"oiqkdgezflikyewnoutjludjp\",
    \"avatar_url\": \"http:\\/\\/rippin.com\\/aliquid-repudiandae-nostrum-earum-in-blanditiis\",
    \"user_education\": {
        \"university\": \"vitae\",
        \"speciality\": \"eligendi\",
        \"start_year\": \"liuupzftppbibnifqkquveid\",
        \"end_year\": \"aunhnsxqccqscctdju\",
        \"for_now\": true
    }
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
    "name": "lqyyxgraihbcwgfxicn",
    "surname": "vmphjllnlyfaxbo",
    "gender": "male",
    "birthdate": "2024-09-18",
    "address": "viqhssgcdzgxafbreenzqw",
    "about": "oiqkdgezflikyewnoutjludjp",
    "avatar_url": "http:\/\/rippin.com\/aliquid-repudiandae-nostrum-earum-in-blanditiis",
    "user_education": {
        "university": "vitae",
        "speciality": "eligendi",
        "start_year": "liuupzftppbibnifqkquveid",
        "end_year": "aunhnsxqccqscctdju",
        "for_now": true
    }
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
               value="lqyyxgraihbcwgfxicn"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>lqyyxgraihbcwgfxicn</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>surname</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="surname"                data-endpoint="PUTapi-v1-client-user"
               value="vmphjllnlyfaxbo"
               data-component="body">
    <br>
<p>Must not be greater than 35 characters. Example: <code>vmphjllnlyfaxbo</code></p>
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
               value="2024-09-18"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d</code>. Example: <code>2024-09-18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-v1-client-user"
               value="viqhssgcdzgxafbreenzqw"
               data-component="body">
    <br>
<p>Must not be greater than 300 characters. Example: <code>viqhssgcdzgxafbreenzqw</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>about</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="about"                data-endpoint="PUTapi-v1-client-user"
               value="oiqkdgezflikyewnoutjludjp"
               data-component="body">
    <br>
<p>Must not be greater than 500 characters. Example: <code>oiqkdgezflikyewnoutjludjp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>avatar_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="avatar_url"                data-endpoint="PUTapi-v1-client-user"
               value="http://rippin.com/aliquid-repudiandae-nostrum-earum-in-blanditiis"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://rippin.com/aliquid-repudiandae-nostrum-earum-in-blanditiis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>user_education</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>university</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="user_education.university"                data-endpoint="PUTapi-v1-client-user"
               value="vitae"
               data-component="body">
    <br>
<p>Example: <code>vitae</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>speciality</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="user_education.speciality"                data-endpoint="PUTapi-v1-client-user"
               value="eligendi"
               data-component="body">
    <br>
<p>Example: <code>eligendi</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>start_year</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="user_education.start_year"                data-endpoint="PUTapi-v1-client-user"
               value="liuupzftppbibnifqkquveid"
               data-component="body">
    <br>
<p>Must be 4 digits. Must be at least 1900 characters. Must not be greater than 2024 characters. Example: <code>liuupzftppbibnifqkquveid</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>end_year</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="user_education.end_year"                data-endpoint="PUTapi-v1-client-user"
               value="aunhnsxqccqscctdju"
               data-component="body">
    <br>
<p>Must be 4 digits. Must be at least 1900 characters. Must not be greater than 2050 characters. Example: <code>aunhnsxqccqscctdju</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>for_now</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
                <label data-endpoint="PUTapi-v1-client-user" style="display: none">
            <input type="radio" name="user_education.for_now"
                   value="true"
                   data-endpoint="PUTapi-v1-client-user"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-client-user" style="display: none">
            <input type="radio" name="user_education.for_now"
                   value="false"
                   data-endpoint="PUTapi-v1-client-user"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
                    </div>
                                    </details>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>categories</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="categories[0]"                data-endpoint="PUTapi-v1-client-user"
               data-component="body">
        <input type="text" style="display: none"
               name="categories[1]"                data-endpoint="PUTapi-v1-client-user"
               data-component="body">
    <br>

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
    \"old_password\": \"yt\",
    \"new_password\": \"c\"
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
    "old_password": "yt",
    "new_password": "c"
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
               value="yt"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>yt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_password"                data-endpoint="PATCHapi-v1-client-user-password"
               value="c"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>c</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PATCHapi-v1-client-user-email">PATCH api/v1/client/user/email</h2>

<p>
</p>



<span id="example-requests-PATCHapi-v1-client-user-email">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/client/user/email" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"new_email\": \"west.josh@example.org\",
    \"current_password\": \"qgj\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/client/user/email"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "new_email": "west.josh@example.org",
    "current_password": "qgj"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-client-user-email">
</span>
<span id="execution-results-PATCHapi-v1-client-user-email" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-client-user-email"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-client-user-email"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-client-user-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-client-user-email">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-v1-client-user-email" data-method="PATCH"
      data-path="api/v1/client/user/email"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-client-user-email', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-client-user-email"
                    onclick="tryItOut('PATCHapi-v1-client-user-email');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-client-user-email"
                    onclick="cancelTryOut('PATCHapi-v1-client-user-email');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-client-user-email"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/client/user/email</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-v1-client-user-email"
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
                              name="Accept"                data-endpoint="PATCHapi-v1-client-user-email"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>new_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="new_email"                data-endpoint="PATCHapi-v1-client-user-email"
               value="west.josh@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>west.josh@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="PATCHapi-v1-client-user-email"
               value="qgj"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Must not be greater than 30 characters. Example: <code>qgj</code></p>
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
