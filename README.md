## About Spiegel Scrapper

A simple laravel and vuejs project that scrappes articles from the home page of
[spiegel.de](https://www.spiegel.de/politik/) using goutte:

## Installing Dependencies
- clone or pull project from [gitHub](https://github.com/ivansempijja/spiegel_scrapper) repo
- Run composer install to install php dependencies
- Run npm install to install javascript dependencies
- Run npm build to build js and scss assets

## Setting up enviroment
- create a .env file in the project root directory (see .env.example)
- Add you database configs and other needed configs to .env
- Run php artisan:migrate to run the database migrations
- Run php artisan serve (to run project using php server), you can also use
valet or sail to run project

## Scraping data
- run php artisan scrape:spiegel
- Command will scrape the front page of [spiegel.de](https://www.spiegel.de/politik/),
and store the articles in an Articles model
- **Only new articles that are not already in the database will be saved**

## Json API
The project includes an end point that returns a json response for the articles,   
go to http://127.0.0.1:8000/api/article to get the json data

## Troubleshooting
- Ensure you have a .env file
- Ensure php dependencies are installed
- Ensure javascript dependencies are installed
- If styling is not working, try running npm build
- For futher help contact [ivan](mailto:ivansempijja@gmail.com)

## License

This is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).\
**There are no guarantees implied**. This code should only be used for study or learning reasons.
