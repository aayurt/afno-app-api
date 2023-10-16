import AppForm from '../app-components/Form/AppForm';

Vue.component('branch-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                description:  '' ,
                
            }
        }
    }

});