# Requirement

Php version >8.1 & Mysql version >5.1



# Project Description

**BMSys**(Blog Management System) a web-based platform , directed towards three different types of authenticated user - **Admin**, **Moderator** and **Author**. Each individual has their own unique role.

Let's  Come to the project, here are some few features related to the project.

- Own Login & Registration System.
- Social Login through Google, Github using Laravel Socialite.
- Only Admin can create Moderator with a email and after a successful creation, a unique password will be send to the Moderator's email for login purpose.
- Moderator can create Tags and Catagories for the Author/Users and also can observe something like total no. Posts, Likes, Comments on the site.
- Author can create Posts, but by default it will not be published, brfore it got published they can update the post, but after that they have only two opt view or delete the post.
- UpVote & DownVote System for individual posts.
- Comment System for individual posts.
- There is a profile section for every type of user. 



# Screenshots
Here are some screenshots related to that project

- **LogIn Screen**
![App Screenshot](https://thumbs2.imgbox.com/0a/7a/TUSnG2wc_t.png)


- **SigUp Screen**
![App Screenshot](https://thumbs2.imgbox.com/82/eb/6G5IaM4s_t.png)



- **Home Screen**
![App Screenshot](https://thumbs2.imgbox.com/3b/b1/DQGApvfK_t.png)

- **Tags Screen**
![App Screenshot](https://thumbs2.imgbox.com/51/12/8PeUK6Sj_t.png)

- **Posts Screen**
![App Screenshot](https://thumbs2.imgbox.com/33/ff/U5bmUTsM_t.png)

- **Moderator Screen**
![App Screenshot](https://thumbs2.imgbox.com/80/ab/K9q7jwi3_t.png)

- **Create Screen**
![App Screenshot](https://thumbs2.imgbox.com/82/85/c7vTzYMQ_t.png)



- **Delete Screen**
![App Screenshot](https://thumbs2.imgbox.com/50/7a/Yw0rzUel_t.png)



- **Author Dashboard Screen**
![App Screenshot](https://thumbs2.imgbox.com/bf/45/ZvS8mMje_t.png)


# Local Installation

After you have the project, in your local environment inside phpMyAdmin create a database named **BMsys**


Run the following Commands
```bash
  php artisan serve
```
```bash
  php artisan migrate:fresh
```
```bash
  php artisan db:seed
```

    
# Customization

### 1) Seeder File Customization :-

If you want to seed predefind seeder files, follow the below steps

go to

```bash
  BMS/database/seeders/DatabaseSeeder.php
```
and uncomment the following lines :-

```bash
        $this->call(UsersSeeder::class);
        $this->call(UserRolePivotSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(CatagoriesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(PostTagPivotSeeder::class);
        $this->call(RatingsSeeder::class);
```
#

### 2) Socialite Customization :-

If you want to enable social login, follow the below steps

go to **.env** file under BMS and put your **google Id & secret Id** inside the quoted line

```bash
GOOGLE_CLIENT_ID="use your google client id "
GOOGLE_CLIENT_SECRET="use your google secret id"
```
put your **github Id & secret Id** inside the quoted line

```bash
GOOGLE_CLIENT_ID="use your google client id "
GOOGLE_CLIENT_SECRET="use your google secret id"
```
#

### 3) Email Verification :-

By default email verification is disable in this project,if you want to enable it do the following steps

- go to 
```bash
BMS/app/Models/User.php
```
replace the class name with
```bash
class User extends Authenticatable implements MustVerifyEmail 
```
- go to 
```bash
BMS/app/Http/Controllers/DashboardController.php
```
replace  **$this->middleware('auth')** under  **function __construct(){...}** with
```bash
$this->middleware(['auth','verified']); 
```
- go to 
```bash
BMS/routes/web.php
```
replace  **Auth::routes();** with
```bash
Auth::routes(['verify' => true]); 
```
#

### 4) Mail Customization :-

go to **.env** file under BMS and replace these with your value,


if you using Google mail you can use those configuration  :-
```bash
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=YOUR_EMAIL_NAME
MAIL_PASSWORD=YOUR_EMAIL_PASSWORD
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=YOUR_EMAIL_NAME
MAIL_FROM_NAME="${APP_NAME}"
```


## Author

- [@itzDeepraj](https://github.com/itzDeepraj)


## License



BMSys is licensed under the [MIT license](https://choosealicense.com/licenses/mit/).
