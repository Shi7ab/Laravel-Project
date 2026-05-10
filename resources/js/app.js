import './bootstrap';

const session = cookieStore.get('Auth_token')
if (!session) {
    location.href = "/";
}
