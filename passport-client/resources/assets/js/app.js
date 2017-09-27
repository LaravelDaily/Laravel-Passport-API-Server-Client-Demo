
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

let api_token = document.head.querySelector('meta[name="api-token"]').content;
let api_url = document.head.querySelector('meta[name="api-url"]').content;

const app = new Vue({
    el: '#app',
    mounted() {
        this.loadProjects();
    },
    data: {

    	projects : [],
    	token: api_token,
        newProject : false,
        newTitle : '',
        newDescription : '',
        editId : false,
    
    },

    methods: {
    	loadProjects() {
            const AuthStr = 'Bearer ' + api_token;
            let parameters = { 
                'headers': { 
                    'Authorization': AuthStr 
                },
            };
    		axios.get(api_url + '/api/v1/projects', { 'headers': { 'Authorization': AuthStr }}).then(function (response) {
			  	this.projects = response.data;
			}.bind(this));
            this.cancel();
    	},
        remove(project) {
            const AuthStr = 'Bearer ' + api_token;
            let parameters = { 
                'headers': { 
                    'Authorization': AuthStr  
                },
            };
            axios.delete(api_url + '/api/v1/projects/' + project.id, parameters).then(function(response) {
                this.loadProjects();
            }.bind(this));
        },
        create() {
            const AuthStr = 'Bearer ' + api_token;
            let parameters = { 
                'headers': { 
                    'Authorization': AuthStr 
                },
                'title' : this.newTitle,
                'description' : this.newDescription,
            };
            if (!this.editId) {
                axios.post(api_url + '/api/v1/projects', parameters).then(function(response) {
                    this.loadProjects();
                    this.newTitle = '';
                    this.newDescription = '';
                }.bind(this));
            } else {
                axios.put(api_url + '/api/v1/projects/' + this.editId, parameters).then(function(response) {
                    this.loadProjects();
                    this.newTitle = '';
                    this.newDescription = '';
                }.bind(this));
            }
            this.cancel();

        },
        edit(project) {
            this.editId = project.id;
            this.newTitle = project.title;
            this.newDescription = project.description;
            this.newProject = true;
        },
        cancel() {
            this.editId = false;
            this.newProject = false;
        }
    },
});
