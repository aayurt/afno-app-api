import AppForm from '../app-components/Form/AppForm';

Vue.component('student-type-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                
            }
        }
    }

});