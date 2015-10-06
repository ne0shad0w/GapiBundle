
<?php foreach ($view['assetic']->stylesheets(array('@GapiBundle/Resources/public/css/*') , array('uglifycss') , array('package'=>'assetic')) as $url): ?>
	<link rel="stylesheet" href="<?php echo $view->escape($url) ?>" />
<?php endforeach; ?>

<div id="statistique"><?php echo $view['translator']->trans('statistique.titre', array()) ?></div>


<div id="embed-api-auth-container"></div>
<div style="padding-left:10px;">
    <div id="chart-container" style="width:50%; float:left; padding:10px;"></div>
    <div id="chart-container2" style="width:50%; float:left; padding:10px 10px 10px 20px;"></div>
    <div id="chart-container3" style="width:50%; float:left; padding:10px;"></div>
    <div id="chart-container4" style="width:50%; float:left; padding:10px 10px 10px 20px;"></div>
</div>

<script>

var ga_ids = '<?=$ga_ids?>'; //parents

(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';

  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));
</script>


<script>

gapi.analytics.ready(function() {

  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '<?=$user?>',
	serverAuth: {
		  access_token: '<?=$token?>'
		}
  });

  var dataChart = new gapi.analytics.googleCharts.DataChart({
    query: {
	  ids: ga_ids,
      metrics: 'ga:newUsers,ga:users',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container',
      type: 'LINE',
      options: {
		title: 'Utilisateurs',
        width: '50%',
      }
    }
  });

  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
	  ids: ga_ids,
      metrics: 'ga:sessions',
      dimensions: 'ga:userType',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container2',
      type: 'PIE',
      options: {
		title: 'Nouveau visiteur',
		is3D: true,
        width: '50%',
		pieHole: 4/9
      }
    }
  });

  var dataChart3 = new gapi.analytics.googleCharts.DataChart({
    query: {
	  ids: ga_ids,
      metrics: 'ga:pageviews,ga:uniquePageviews',
      dimensions: 'ga:date',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container3',
      type: 'LINE',
      options: {
		title: 'Pages vues',
        width: '50%',
      }
    }
  });
  var dataChart4 = new gapi.analytics.googleCharts.DataChart({
    query: {
	  ids: ga_ids,
      metrics: 'ga:organicSearches',
      dimensions: 'ga:source',
      'start-date': '30daysAgo',
      'end-date': 'yesterday'
    },
    chart: {
      container: 'chart-container4',
      type: 'PIE',
      options: {
		title: 'Sources de trafic',
		is3D: true,
        width: '50%',
		pieHole: 4/9
      }
    }
  });

   dataChart.set().execute();
   dataChart2.set().execute();
   dataChart3.set().execute();
   dataChart4.set().execute();

});
</script>
