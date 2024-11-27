import AppForm from '../app-components/Form/AppForm';

Vue.component('food-item-tag-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tag:  '' ,
                count:  0 ,
                
            }
        }
    }

});