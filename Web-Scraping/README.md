Scholar Scraper
I wrote this simple utility to scrape citation statistics of researcher profiles on Google Scholar. This list contains only researchers who have a Google Scholar profile; names were identified by snowball sampling and various other ad hoc techniques.


Rerunning the Scraper
---------------------

Assuming you have [node.js](http://nodejs.org/) installed, rerun the scraper as follows:

```
$ npm install request cheerio async
$ node scrape.js ./people-hci.json > stats-hci.json
```

To scrape the images:

```
$ node download-images.js ./stats-hci.js
```

Then open up `index.html` and it should display the new statistics.
