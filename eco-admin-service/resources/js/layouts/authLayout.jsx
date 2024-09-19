import {Head} from "@inertiajs/react";

export default function MainLayout({ title, children }) {
    return (
        <>
            <Head title={title} />
            <div className={'h-dvh'}>
                {children}
            </div>
        </>
    );
}
