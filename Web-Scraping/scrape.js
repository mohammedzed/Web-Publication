
var request = require('request');
var cheerio = require('cheerio');
var async = require('async');
var people = require(process.argv[2]);

var scrapeEntry = function(person, doneCallback) {
  var url = people[person];
  var data = {};

  request({ encoding: 'binary', method: "GET", uri: url}, function(err, resp, body) {
    var $ = cheerio.load(body);

    try {
      console.error("Scraping " + person + "...");
//scrape Scholar Photo
      var photo = $('#gsc_prf_pup')[0].attribs.src.replace(/&amp;/g, '&');

//scrape Scholar affiliation or Company
      var affiliation = $('.gsc_prf_il', '#gsc_prf_i').first().text();

//scrape Scholar Keywords
      var keywords_root = $('.gsc_prf_ila');
      var keywords = [];

      for (var i=0; i<keywords_root.length; i++) {
        keywords.push(keywords_root[i].children[0].data);
      }
//scrape Scholar Publication data: Title,Author,Venue,Cited by,Year
      var citatio = $('.gsc_a_at');
      var citaff = $('.gs_gray');
      var citedBy = $('.gsc_a_ac');
      var citedYear = $('.gsc_a_h');
      var PublicationArray = []
      var PublicationObject = {}

      for (var j=0; j<citedBy.length; j++) {
        PublicationObject = {}
        PublicationObject ['Title']     = citatio[j].children[0].data,
        PublicationObject ['Author']    = citaff[2*j].children[0].data,
        PublicationObject ['Venue']     = citaff[2*j+1].children[0].data,
        PublicationObject ['CitedBy']   = citedBy[j].children[0].data,
        PublicationObject ['Year']      = citedYear[j+1].children[0].data

      PublicationArray.push(PublicationObject);
      }

//scrape Status Table or Citation indices
      var rawStats = $('#gsc_rsb_st');
      var stats = []
      var statusObject = {}

        statusObject['citations']           = rawStats[0].children[1].children[1].children[0].data,
        statusObject['citationsSince2011']  = rawStats[0].children[1].children[2].children[0].data,
        statusObject['hindex']              = rawStats[0].children[2].children[1].children[0].data,
        statusObject['hindexSince2011']     = rawStats[0].children[2].children[2].children[0].data,
        statusObject['i10index']            = rawStats[0].children[3].children[1].children[0].data,
        statusObject['i10indexSince2011']   =  rawStats[0].children[3].children[2].children[0].data

        stats.push(statusObject);


      data = {
        'name'             : person,
        'photo'            : 'http://scholar.google.com' + photo,
        'keywords'         : keywords,
        'affiliation'      : affiliation,
        'url'              : url,
        'PublicationArray' : PublicationArray,
        'stats'            : stats
      };

    } catch (ex) {
      throw new Error(person);
    }

// Adding a timeout to regulate scraping speed.
    setTimeout(function() {
      doneCallback(null, data);
    }, 3000);
  });
};

//scrape Citation indices bar Table
var scrapeYear = function(entry, doneCallback) {
  var histUrl = entry['url'] + "&view_op=citations_histogram";

  request(histUrl, function(err, resp, body) {
    $ = cheerio.load(body);

    try {
      year = $('.gsc_g_t')[0].children[0].data;
    } catch(ex) {
      throw new Error(entry['url']);
    }
    entry['year'] = year;
    doneCallback(null, entry);
  });
};

async.mapSeries(Object.keys(people), scrapeEntry, function (err, results) {
  async.mapSeries(results, scrapeYear, function (err, results) {
    console.log(JSON.stringify(results, null, 2));
  });
});
