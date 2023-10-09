import AppForm from "../app-components/Form/AppForm";

Vue.component("sub-activity-form", {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activity_id: "",
                title: "",
                subtitle: "",
                body: "",
                link: "",
                fullWidth: false,
                enabled: false,
                textTop: false,
                textDark: false
            }
        };
    },
    mediaCollections: ["cover", "gallery", "pdf"]
});
