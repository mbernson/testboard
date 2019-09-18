# Testboard: a dashboard for your automated tests

Testboard lets you see at a glance what the status of your test suites is.
Many individual test results are aggregated to give a better overview.

## API

```
curl -F "report=@report.junit.xml" "http://homestead.test/api/projects/1/apps/1/submissions?api_token=verysecuretokenhere"
```