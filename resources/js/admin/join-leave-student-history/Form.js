import AppForm from '../app-components/Form/AppForm';

Vue.component('join-leave-student-history-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                status:  '' ,
                joining_date:  '' ,
                leaving_date:  '' ,
                student_id:  '' ,
                
            }
        }
    }

});