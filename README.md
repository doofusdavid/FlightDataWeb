# CS455 Flight Data Analysis Web Site

This is a work-in-progress site analyzing the data we calculated from the Flight Data dataset ([http://stat-computing.org/dataexpo/2009/the-data.html](http://stat-computing.org/dataexpo/2009/the-data.html))

The code responsible for creating these datasets resides at ([https://github.com/bdeining/flightanalysis](https://github.com/bdeining/flightanalysis))
### Authors
* Ben Deininger
* Nicholas Malensek
* David Edwards
* Stephen Rhoads

## Sources
Uses the Mini2 PHP application for formatting, page layout and templating.  ([https://github.com/panique/mini2](https://github.com/panique/mini2))

Uses Chart.js for chart creation ([https://github.com/chartjs/Chart.js](https://github.com/chartjs/Chart.js))

Uses Plot.ly for additional chart creation ([https://plot.ly/](https://plot.ly/))
## Local Development

1. Activate mod_rewrite in Apache
2. Reroute all requests to the FlightDataWeb/public/public directory.  

    Change `DocumentRoot` and `Directory` values to point here.  Restart apache.
3. Get dependencies via Composer

    Do a `composer install` in the FlightDataWeb directory.