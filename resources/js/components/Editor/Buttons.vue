<template>
    <div v-if="editor" class="grid grid-cols-5 sm:grid-cols-8 lg:grid-cols-12 gap-1">
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('bold') " @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
        bold
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('italic') " @click="editor.chain().focus().toggleItalic().run()" :class="{ 'is-active': editor.isActive('italic') }">
        italic
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('strike') " @click="editor.chain().focus().toggleStrike().run()" :class="{ 'is-active': editor.isActive('strike') }">
        strike
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('code') " @click="editor.chain().focus().toggleCode().run()" :class="{ 'is-active': editor.isActive('code') }">
        code
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('clear_marks') " @click="editor.chain().focus().unsetAllMarks().run()">
        clear marks
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('clear_nodes') " @click="editor.chain().focus().clearNodes().run()">
        clear nodes
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('paragraph') " @click="editor.chain().focus().setParagraph().run()" :class="{ 'is-active': editor.isActive('paragraph') }">
        paragraph
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('h1') " @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
        h1
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('h2') " @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }">
        h2
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('h3') " @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }">
        h3
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all')  || buttonSelect.includes('h4') " @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }">
        h4
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('h5')  " @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }">
        h5
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('h6')  " @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }">
        h6
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('bullet_list')  " @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }">
        bullet list
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('ordered_list')  " @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
        ordered list
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('code_block')  " @click="editor.chain().focus().toggleCodeBlock().run()" :class="{ 'is-active': editor.isActive('codeBlock') }">
        code block
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('block_quote')  " @click="editor.chain().focus().toggleBlockquote().run()" :class="{ 'is-active': editor.isActive('blockquote') }">
        blockquote
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('horizontal_rule')  " @click="editor.chain().focus().setHorizontalRule().run()">
        horizontal rule
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('hard_break')  " @click="editor.chain().focus().setHardBreak().run()">
        hard break
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('undo')  " @click="editor.chain().focus().undo().run()">
        undo
      </button>
      <button class="grid place-items-center bg-gray-300 hover:bg-yellow-300 py-1 hover:text-white text-black-main rounded-sm cursor-pointer" v-if="buttonSelect.includes('all') || buttonSelect.includes('redo')  " @click="editor.chain().focus().redo().run()">
        redo
      </button>
    </div>
</template>

<script>
export default {
    name: "EditorButtons",
    props: {
        editor: {
            type: Object,
            required: false,
            default: null
        },
        buttonSelect: {
            type: Array,
            required: false,
            default: ['all']
        }
    },
}
</script>

<style lang="scss" scoped>
    button {
        font-size: 10px;
    }
</style>
