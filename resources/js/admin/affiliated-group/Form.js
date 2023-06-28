import AppForm from "../app-components/Form/AppForm";

Vue.component("affiliated-group-form", {
    mixins: [AppForm],
    props: ["affiliatedCategories"],
    data: function() {
        return {
            form: {
                title: this.getLocalizedFormDefaults(),
                short_description: this.getLocalizedFormDefaults(),
                description: this.getLocalizedFormDefaults(),
                enabled: false,
                affiliated_group_category_id: ""
            },
            mediaCollections: ["cover", "gallery", "pdf"]
        };
    }
});
