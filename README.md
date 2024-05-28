## E-learning site manager API

This is my take for the description provided.
I know there is some missing logic and that I was not able to meet the deadline...

I decided to use Laravel Framework for the scaffolding it provides to start up the project.

To start up the project you will have to:

- Clone the project locally from https://github.com/santi1703/e-learning-courses
- Copy the .env.example file, and rename it to .env
    - Fill in the DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD values in the .env file with the info of your database
    - Run the artisan _key:generate_ command
    - Run the artisan _migrate_ command
    - Run the artisan _db:seed_ command
- I created a Postman collection for laziness reasons...
  - You can download it at https://drive.google.com/file/d/1zxyJZstIwAsB1DBvgW0cX61Zx_tltNqo/view?usp=sharing
  - I provided a getToken endpoint for retrieving a token for the users to be able to perform requests
  - There are 2 users which I used for test the endpoints, one has the role _student_ (student_cromwell@elearning.com), the other one has the role _professor_ (the.professor@elearning.com)
  - There are 2 folders with the corresponding endpoint calls for both roles
- There is a lot of missing logic such as taking into account lesson scores and such, but the time frame was not enough for me to work on those not explicitly requested features


I hope that you find this test project fitting for me to get aboard.

Santiago
