import MainLayout from '@/layouts/mainLayout.jsx';
import {usePage} from "@inertiajs/react";
function MainPage() {
    const { props } = usePage();
    const user = props.auth.user;

    return (
        <div>
            <h1 className={'text-2xl'}>Добро пожаловать, {user.name}</h1>
        </div>
    )
}
MainPage.layout = (page) => (
    <MainLayout title="Главная" children={page}/>
);

export default MainPage;
