## Laravel Passport API Demo

Simple mini-project with Laravel 5.5 Passport Server and a Client (Laravel 5.5 + Vue.js 2) to authorize and get some data from API.

### How it works

1. You launch Client URL and see button **Login with Passport**

![Login with Passport](http://webcoderpro.com/passport-client1.png)

2. You enter credentials from Server database's Users table and log in. Then you get to Authorize the client.

![Passport Authorize](http://webcoderpro.com/passport-client2.png)

3. Then you see a Sample CRUD **Projects** where all data management is done via API calls to the Server.

![Passport Projects](http://webcoderpro.com/passport-client3.png)

---

### How to use

There are actually two different (but tied together) projects in this repository, so you see the folders.

First, Clone the repository and map your client and server domains separately to folder **/passport-client** and **/passport-server** from the repository.

Then, we need to take care of Server and Client separately.

**Step 1. Install and configure Passport Server**

1. Go to folder **/passport-server** in your Terminal or Command Prompt
2. Copy **.env.example** to **.env** and fill in your database credentials
3. Run **composer install**
4. Run **php artisan key:generate**
5. Run **php artisan migrate --seed**
6. Run **php artisan passport:client** - enter ID equals 1, name can be whatever, and callback should be http(s)://[your_client_url]/callback
7. Run **php artisan passport:keys**

**Step 2. Install and configure Passport Client**

1. Go to folder **/passport-client** in your Terminal or Command Prompt
2. Copy **.env.example** to **.env**
3. Run **composer install**
4. Run **php artisan key:generate**
5. In **.env** fill in these variables from Server Database: 
* **APP_CLIENT_ID**=[oauth_clients.id value]
* **API_CLIENT_SECRET**=[oauth_clients.secret value]
* **API_URL** = http(s)://[your_server_url]

**Step 3. Launch client**

That's it, launch your client URL, click **Login with Passport** and enter default credentials: **admin@admin.com - password**.

---

### License

Please use and re-use however you want.