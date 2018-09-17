
let token = document.head.querySelector('meta[name="csrf-token"]');

let content = '';
if (token) {
    content = token.content;
}

let csrf = {
    name: 'X-CSRF-TOKEN',
    token: content,
}

export default csrf;