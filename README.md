# Testboard: a dashboard for your automated tests

Testboard lets you see at a glance what the status of your test suites is.
Many individual test results are aggregated to give a better overview.

## How to run

Install [Docker Desktop](https://www.docker.com/products/docker-desktop).

```bash
docker-compose up -d
cp .env.example .env
docker-compose run app php artisan key:generate
docker-compose run app php artisan migrate
```

The application should now be reachable at <http://localhost/.>

## API

```bash
curl -F "report=@report.junit.xml" "http://homestead.test/api/projects/1/apps/1/submissions?api_token=verysecuretokenhere"
```
