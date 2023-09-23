import AppForm from '../app-components/Form/AppForm';

Vue.component('archive-category-form', {
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