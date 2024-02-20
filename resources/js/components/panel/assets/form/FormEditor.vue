<template>
    <div>
        <editor
            api-key="f5f2mrqj977s53ft8mnswrhwixr4w3syrnpyxzvd0xk5zhjb"
            :init="editorSettings"
            :value="editorContent"
            v-model="editorContent"
            @input="updateEditorContent"
        />
    </div>
</template>

<script>
import Editor from "@tinymce/tinymce-vue";

export default {
    name: "app",
    components: {
        editor: Editor,
    },
    props: {
        content: {
            default: 'ru',
            type: String,
        },
    },
    data() {
        return {
            editorContent: this.content,
            editorSettings: {
                height: 500,
                menubar: false,
                plugins: [
                    "advlist",
                    "autolink",
                    "lists",
                    "link",
                    "image",
                    "charmap",
                    "preview",
                    "anchor",
                    "searchreplace",
                    "visualblocks",
                    "fullscreen",
                    "insertdatetime",
                    "media",
                    "table",
                    "help",
                    "wordcount",
                ],
                toolbar:
                    "image undo redo | casechange blocks | bold italic backcolor | " +
                    "alignleft aligncenter alignright alignjustify | bullist numlst checklist outdent indent | " +
                    "removeformat | a11ycheck code table help",
                images_upload_url: "/api/upload-editor-image",
                images_upload_base_path: "/uploads",
                images_upload_credentials: true,
                language: 'ru',
                language_url: "/assets/admin/js/lang/ru.js",
            },
        };
    },
    methods: {
        updateEditorContent(content) {
            this.editorContent = content;
        },
    },
    computed: {
        editorContent: {
            get() {
                return this.content
            },
            set(newValue) {
                let dataInput = {
                    value: newValue,
                }
                this.$emit('onDataUpdated', dataInput)
            }
        }
    }
};
</script>
