import AuthLayout from '@/layouts/authLayout.jsx'
import {useForm} from "@inertiajs/react";
import {ErrorMessage, Field, Label} from '@/components/fieldset'
import { Input } from '@/components/input'
import {Button} from "@/components/button.jsx";

function LoginPage () {
    const { data, setData, errors, post, processing } = useForm({
        login: '',
        password: '',
        remember: true
    });

    function handleSubmit(e) {
        e.preventDefault();

        post('/login');
    }

    return (
        <>
            <div className="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
                <div className="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 className="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">
                        Войдите в свой аккаунт
                    </h2>
                </div>

                <div className="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form onSubmit={handleSubmit} className="space-y-6">
                        <div>
                            <div className="mt-2">
                                <Field>
                                    <Label>Электронная почта</Label>
                                    <Input placeholder={"example@gmail.com"} onChange={e => setData('login', e.target.value)} value={data.login} name="login" invalid={errors.login != null} />
                                    {errors.login && <ErrorMessage>{errors.login}</ErrorMessage>}
                                </Field>
                            </div>
                        </div>

                        <div>
                            <Field>
                                <Label>Пароль</Label>
                                <Input placeholder={"******"} type={'password'} onChange={e => setData('password', e.target.value)} value={data.password} name="password" invalid={errors.password != null} />
                                {errors.password && <ErrorMessage>{errors.password}</ErrorMessage>}
                            </Field>
                        </div>

                        <div>
                            <Button className={"w-full mt-4"} type={"submit"}>Войти</Button>
                        </div>
                    </form>

                    <p className="mt-10 text-center text-sm text-gray-400">
                        Нету доступа?{' '}
                        <a href="https://t.me/gelious7" className="font-semibold leading-6 text-zinc-100 hover:text-indigo-300">
                            Получите доступ
                        </a>
                    </p>
                </div>
            </div>
        </>
    )
}

LoginPage.layout = (page) => (
    <AuthLayout title="Вход" children={page} />
);

export default LoginPage
