import AppForm from "../app-components/Form/AppForm";

Vue.component("member-form", {
    mixins: [AppForm],
    props: ["memberCategories"],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                short_description: this.getLocalizedFormDefaults(),
                description: this.getLocalizedFormDefaults(),
                enabled: false,
                member_category_id: ""
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});