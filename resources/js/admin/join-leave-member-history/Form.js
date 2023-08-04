import AppForm from '../app-components/Form/AppForm';

Vue.component('join-leave-member-history-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                status:  '' ,
                joining_date:  '' ,
                leaving_date:  '' ,
                member_id:  '' ,
                
            }
        }
    }

});