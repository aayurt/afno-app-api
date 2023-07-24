import AppForm from '../app-components/Form/AppForm';

Vue.component('board-member-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                designation:  '' ,
                member_id:  '' ,
                
            }
        }
    }

});