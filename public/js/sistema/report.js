$(function(){
	$(function () { 
	    $('#certificatebycountry').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        title: {
	            text: 'Certificados por País'
	        },
	        xAxis: {
	            categories: countrys
	        },
	        yAxis: {
	            title: {
	                text: 'N° Certificados'
	            }
	        },
	        series: [{
	            name: 'Certificados',
	            data: enrolleds_by_country
	        }]
	    });
	});

	$(function () { 
	    $('#studentsbycourse').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        title: {
	            text: 'Alumnos por Certificación'
	        },
	        xAxis: {
	            categories: courses
	        },
	        yAxis: {
	            title: {
	                text: 'N° Participantes'
	            }
	        },
	        series: [{
	            name: 'Alumnos',
	            data: enrolleds_by_course
	        }]
	    });
	});

	$(function () { 
	    $('#certificatebyyear').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        title: {
	            text: 'Certificados por Año'
	        },
	        xAxis: {
	            categories: [2012, 2013, 2014, 2015, 2016]
	        },
	        yAxis: {
	            title: {
	                text: 'N° Certificados'
	            }
	        },
	        series: [{
	            name: 'Certificados',
	            data: enrolleds_by_year
	        }]
	    });
	});
});