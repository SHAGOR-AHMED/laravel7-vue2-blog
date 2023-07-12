import moment from 'moment';
import Vue from 'vue';

Vue.filter('time', function(abc){
  return moment(abc).format('MMMM Do YYYY');  
});