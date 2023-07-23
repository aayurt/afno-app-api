import AppForm from '../app-components/Form/AppForm';

Vue.component('student-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                address:  '' ,
                
            }
        }
    }

});