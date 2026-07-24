import { usePage } from '@inertiajs/vue3';
import User from '@/models/User';

export function useCurrentUser() {
    const page = usePage()

    const user = new User(page.props.auth.user)

    return { user }
}
