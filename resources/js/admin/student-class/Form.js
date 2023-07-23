import AppForm from '../app-components/Form/AppForm';

Vue.component('student-class-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                
            }
        }
    }

});