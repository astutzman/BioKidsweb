/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require( 'jquery' );
require( 'datatables.net' );
//import { Bar } from 'vue-chartjs';

/*get the image from the Observation and show it the modal box */
jQuery(document).ready(function($) {
    updateModal = function(img) {	
		app.modalimg = '/images/obv-images/'+img;
	}
});

window.Vue = require('vue');


var app = new Vue({
	el: '#app',

	data: {
			modalimg: '', obvimg: '', maplng:'', maplat:'', mapadr:'', mapcity:'', mapstate:'', mapzip:'', geocode:'', infowindow:'', dataURL:''

	},

	mounted: function() {
			
			//if Location
		 	if(~window.location.pathname.indexOf("location") || ~window.location.pathname.indexOf("program"))
		 	{
		 		this.showMap();//this.showMap();
		 		this.addMarker();//add onClick Event
			}
			//if Location
		 	if(~window.location.pathname.indexOf("observation"))
		 	{
		 		this.dataURL = '/observations/datatables';
		 		this.showDataTable();
		 	}
		 	if(~window.location.pathname.indexOf("teach-data"))
		 	{
		 		this.dataURL = '/observations/datatables?type=teach';
		 		this.showDataTable();
		 	}
		 	//if Obv Map
		 	if(~window.location.pathname.indexOf("observations/map"))
		 	{
		 		this.dataURL = '/observations/mapdata';		 		
		 		this.showObvMap();
		 	}
		 	//if Obv Map
		 	if(~window.location.pathname.indexOf("teach-data/map"))
		 	{
		 		this.dataURL = '/observations/mapdata?type=teach';
		 		this.showObvMap();
		 	}
		 	//if Obv Map
		 	if(~window.location.pathname.indexOf("observations/progress") || ~window.location.pathname.indexOf("teach-data/progress"))
		 	{
		 		this.dataURL = '/observations/typebar';
		 		this.showTypeChart();
		 	}

	},

	components: {

		'obv-button': {
			
			props: ['obv-image'],

			template: '<button type="button" class="btn btn-info btn-sm" data-toggle="modal"'+
					  'data-target="#obvmodal" obv-image={{obvimg}}>View Image</button>',

			data: function () {
        			return {
          				obvimg: ''
        			}
      			},

			}
		},
	
	methods: {

		showMap: function(){

				this.marker = new google.maps.Marker();


				//check if fields are currently filled
				if(~window.location.pathname.indexOf("edit")){

					//set data values from form data
					this.maplng = parseFloat(document.getElementById('lngField').getAttribute('locdata'));
					this.maplat = parseFloat(document.getElementById('latField').getAttribute('locdata'));
					this.mapadr = document.getElementById('streetField').getAttribute('locdata');
					this.mapcity = document.getElementById('cityField').getAttribute('locdata');
					this.mapstate = document.getElementById('stateField').getAttribute('locdata');
					this.mapzip = document.getElementById('zipField').getAttribute('locdata');

					map = new google.maps.Map(document.getElementById('map'), {
		          		zoom: 16,
		          		center: {lat:this.maplat, lng: this.maplng}
		        	});


					//set marker for current address
					this.marker = new google.maps.Marker({position: {lat:this.maplat, lng:this.maplng}, map:map});
				}
				else {
					//start location at ExCITe Center
					this.$data.maplng = -75.191729;
					this.$data.maplat =  39.956175;

					map = new google.maps.Map(document.getElementById('map'), {
		          		zoom: 16,
		          		center: {lat:this.maplat, lng: this.maplng}
		        	});

		        }
		},

		addMarker: function(){

				geocoder = new google.maps.Geocoder;
				infowindow = new google.maps.InfoWindow;
				//marker = new google.maps.Marker;
				vm = this;


				google.maps.event.addListener(map, "click", function(event) {        	
						
						
						vm.marker.setMap(null);
 				 		vm.marker = new google.maps.Marker({
 				 			position:event.latLng,
 				 			map:map
 				 		});

			 			//set lat/lng data				
	 					vm.$data.maplat= event.latLng.lat();
	 					vm.$data.maplng=event.latLng.lng();

				 		geocoder.geocode({location: event.latLng}, function(results, status) {
				 			if(status === 'OK') 
				 			{
				 				
				 				geo_results = results[0];
				 				if(results[0])
				 				{
				 					
				 					//update hidden Lat/Lng fields
				 					//check if business name is in first field by checking for numbers
				 					if(/\d/.test(results[0].address_components[0].short_name)){
				 						vm.$data.mapadr = results[0].address_components[0].short_name+' '+results[0].address_components[1].short_name;
				 					}
				 					else {
				 						vm.$data.mapadr = results[0].address_components[1].short_name+' '+results[0].address_components[2].short_name;
				 					}
				 					//vm.$data.mapadr=results[0].address_components[0].short_name+' '+results[0].address_components[1].short_name;
				 					vm.$data.mapcity=results[0].address_components[2].short_name;
				 					vm.$data.mapstate=results[0].address_components[5].short_name;
				 					
				 					//check for proper zip code element by checking for numbers
				 					if(/\d/.test(results[0].address_components[7].short_name)){
				 						vm.$data.mapzip = results[0].address_components[7].short_name;
				 					}
				 					else {
				 						vm.$data.mapzip = results[0].address_components[8].short_name;
				 					}
				 					//console.log($('#zipField').value);

				 					infowindow.setContent('<strong>The street address is:</strong><br /><br />'+
				 						results[0].formatted_address+'<br /><br />'+
				 						'<strong>Your form has been updated with this address.<br />  Click "Submit" to save your information.</strong>'
				 						);

					            	//show marker with address
					            	infowindow.open(map, vm.marker);

					            	//store temp address data
				 				}
				 				else 
				 				{
				 					window.alert('No street address found');
				 				}
				 			}
				 			
				 			else 
				 			{

				 				window.alert('Sorry!  We could not get the address due to:' + status);
				 			}
				 		});

		 			});
	 			

		},

		showDataTable: function() {

				var vm = this;



				$(document).ready(function() {
				    dataTable = $('#observeTable').DataTable({
				    	dom: 'Bfrtip',
				    	pagingType: 'simple_numbers',
				        processing: true,
				        serverSide: true,
				        ajax: vm.dataURL,
				        defaultContent: "<i>empty</i>",
				        scrollX: true,
				        columnDefs:[
				        	{
				        		targets: [2,4,9,10,12,13],
				        		className: 'noVis',
				        		visible: false
				        	},
				        	{
				        	    render: function ( data, type, row ) {
				        	    	return '<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#obvmodal" onClick="updateModal('+"'"+data+"'"+')">View</button>';
				                },
				                targets: 14
				            } 

				        ],
				        buttons: [
					        {
					        	extend: 'colvis',
					        	columns: ':not(.noVis)'
					        }
				        ],
				        columns:[
				        	{data: 'id', title: 'ID'},
				        	{data: 'obvType', title: 'Type'},
				        	{data: 'animalGroup', title:'Animal'},
				        	{data: 'animalType', title:'Animal Type'},
				        	{data: 'animalSubType', title: 'Sub Type'},				        	
				        	{data: 'howSensed', title:'How?'},
				        	{data: 'animalPosition', title:'Where?'},
				        	{data: 'animalAction', title:'Doing?'},
				        	{data: 'plantKind', title: 'Plant'},
				        	{data: 'grassKind', title: 'Grass'},
				        	{data: 'howMuchPlant', title: 'Plant#'},
				        	{data: 'howManySeen', title: 'Count'},
				        	{data: 'howManyIsExact', title: 'Exact#'},				        	
				        	{data: 'note', title: 'Note'},
				        	{data: 'photoLocation', title:'Image'},
				        	{data: 'groups.name', title: 'Group'},
				        	{data: 'groups.users.programs.program', title: 'Program'},				        	
				        	{data: 'created_at', type: 'date-dd-mmm-yyyy', target: 17,title: 'Date'}

				        ]

				    });
				});


		},

		showObvMap: function(){


					//start location at ExCITe Center
					this.$data.maplng = -75.191729;
					this.$data.maplat =  39.956175;

					map = new google.maps.Map(document.getElementById('map'), {
		          		zoom: 14,
		          		center: {lat:this.maplat, lng: this.maplng}
		        	});

		        	//get markers
		        	this.addObvMarkers();

		        
		},

		addObvMarkers: function(){

			var obvMarkers = new Array();
			var filter = '';
			//var filter = document.getElementById('obvChart').getAttribute('data-filter');
			if(filter) {vm.dataURL+="?filter="+filter;}

	 		//console.log('filter: '+filter);
        	//GET OBSERVATIONS BY PROGRAM
        	if(!filter)
        	{
        	 $.getJSON(this.dataURL, function(result){

        	 		//loop through JSON data
					$.each(result, function(i, field){
						
	        			//clean the data
	        			temp_position = {lat: parseFloat(field.latitude), lng:parseFloat(field.longitude)};
	        			
	        			//add markers to map 
	        			var marker = new google.maps.Marker({position:{lat:parseFloat(field.latitude), lng:parseFloat(field.longitude)} , map:map, title:field.program});

	        			var iw = new google.maps.InfoWindow;
	        			var iwContent = '<ul>';
	        			$.each(field.users, function(x, teachers) {
	        				//console.log(teachers);
	        				$.each(teachers.groups, function(y, tgroups){
	        				console.log(tgroups);
	        					iwContent += '<li>'+tgroups.name+': '+tgroups.observations.length+' records</li>';	
	        				});
	        				
	        			});
	        			iwContent += '</ul>';
	        			iw.setContent('<strong>'+field.program+'</strong><div>'+iwContent+'</div>');
	        			
	        			google.maps.event.addListener(marker, "click", function(event) {  

			            	//show marker with address
			            	iw.open(map, marker);
			            
	        			}); 
	        			
	        			
	        		});
	        			
	    		});        		
    		} //END IF

	    	if(filter === 'observations')
	    	{
	        	//GET ALL OBSERVATIONS	
	    		$.getJSON("mapdata?filter="+filter, function(result){
	        		obvMarkers = result;

	        		$.each(result, function(i, field){

	        			//clean the data
	        			var temp_position = {lat: parseFloat(field.groups.users.programs.latitude), lng:parseFloat(field.groups.users.programs.longitude)};
	        			//add markers to map
	        			//console.log(temp_position); 
	        			var marker = new google.maps.Marker({position:temp_position , map:map, title:field.groups.users.programs.program});

	        			var iw =  new google.maps.InfoWindow;
	        			
						iw.setContent('<strong>'+marker.title+'</strong>');

						google.maps.event.addListener(marker, "click", function(event) {

						iw.open(map, marker);
						});
	 
	        		}); 
	        			
	        			//push marker to array
	        			
	        	});

	    	} //END IF


		}, //End observation data method

		showTypeChart: function() {

			var vm = this;
			var filter = document.getElementById('obvChart').getAttribute('data-filter');
			if(filter) {vm.dataURL+="?filter="+filter;}
			
			//GET ALL OBSERVATIONS	
    		$.getJSON(vm.dataURL, function(result){		

					var ctx = document.getElementById("obvChart").getContext('2d');
					let chartColors = dynamicColors(Object.keys(result.type).length);
					console.log(chartColors);
					var myChart = new Chart(ctx, {
		    			type: 'bar',
		    			data: {
		        			labels: result.type,
		        			datasets: [{
		            		label: '# of Observations',
		            		data: result.count,
		            		backgroundColor: '#3cb434',
		            		borderWidth: 2,
		            		responsive: true,
		            		
		            		}]
		           		}
		            });
        	});

        	var dynamicColors = function(x) {
    			mycolors = new Array();
    			for(i=0; i < x; i++) {
    				var r = Math.floor(Math.random() * 255);
    				var g = Math.floor(Math.random() * 255);
    				var b = Math.floor(Math.random() * 255);

    				mycolors.push("rgb(" + r + "," + g + "," + b + ")");
    			}
    			return mycolors;
			}
			
		} //end type chart method


	} //END METHODS

});

