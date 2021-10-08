<template>
    <div class="editor text-white" >
        <EditorButtons :editor="editor" :buttonSelect="buttonSelect" />
        <div class="py-2"></div>
        <EditorContent :editor="editor"></EditorContent>
    </div>
</template>

<script>
import { Editor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import EditorButtons from "./Buttons";
export default {
    name: "Index",
    components: {
        EditorContent,
        EditorButtons
    },
    props: {
        modelValue: {
          type: String,
          default: '',
        }
    },
    data() {
        return {
              editor: null,
              buttonSelect: ['bold', 'italic', 'strike', 'code',
                    'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'bullet_list',
                    'ordered_list', 'code_block',
                    'undo', 'redo'
             ]
        }
    },
    watch: {
        modelValue(value) {
          const isSame = this.editor.getHTML() === value

          if (isSame) {
            return
          }

          this.editor.commands.setContent(value, false)
        },
    },
    mounted() {
        this.editor = new Editor({
              content: (Object.entries(this.$store.state.editNote).length !== 0) ? this.$store.state.editNote.description : '',
              extensions: [
                StarterKit,
              ],
            onUpdate: () => {
                this.$emit('updatedModelValue', this.editor.getHTML())
              },
        })
    }

}
</script>

<style lang="scss">

</style>
