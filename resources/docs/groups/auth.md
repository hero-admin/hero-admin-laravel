# Auth


## Revoke a login user token

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/account/verification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/account/verification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-account-verification" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-account-verification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-account-verification"></code></pre>
</div>
<div id="execution-error-DELETEapi-account-verification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-account-verification"></code></pre>
</div>
<form id="form-DELETEapi-account-verification" data-method="DELETE" data-path="api/account/verification" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-account-verification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/account/verification</code></b>
</p>
<p>
<label id="auth-DELETEapi-account-verification" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-account-verification" data-component="header"></label>
</p>
</form>


## Verify an account




> Example request:

```bash
curl -X POST \
    "http://localhost/api/account/verification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"swyman@example.com","password":"a"}'

```

```javascript
const url = new URL(
    "http://localhost/api/account/verification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "swyman@example.com",
    "password": "a"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "accessToken": {
        "name": "deven.stiedemann@example.net",
        "abilities": [
            "*"
        ],
        "tokenable_id": 1,
        "tokenable_type": "App\\Models\\User",
        "updated_at": "2020-12-19T09:07:14.000000Z",
        "created_at": "2020-12-19T09:07:14.000000Z",
        "id": 16
    },
    "plainTextToken": "16|fc4ei17QJKPFdl3AvrdNpkS6me512B104onSF7Yw"
}
```
> Example response (404):

```json
{
    "message": "Resource not found"
}
```
<div id="execution-results-POSTapi-account-verification" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-account-verification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-account-verification"></code></pre>
</div>
<div id="execution-error-POSTapi-account-verification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-account-verification"></code></pre>
</div>
<form id="form-POSTapi-account-verification" data-method="POST" data-path="api/account/verification" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-account-verification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/account/verification</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-account-verification" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-account-verification" data-component="body" required  hidden>
<br>
</p>

</form>



