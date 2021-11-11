require('./bootstrap');

import Vue from 'vue'
import VueAxios from 'axios'
import axios from 'axios'

// setting up views
import {Home} from './Views'


// execute views to webpage
new Vue({
	el: '#home',
	component: {Home},
	render: h => h(Home)
})