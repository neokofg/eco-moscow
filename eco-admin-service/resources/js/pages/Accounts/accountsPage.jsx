import MainLayout from "@/layouts/mainLayout.jsx";
import {Input, InputGroup} from "@/components/input.jsx";
import {MagnifyingGlassIcon} from "@heroicons/react/16/solid/index.js";
import {Button} from "@/components/button.jsx";
import {Divider} from "@/components/divider.jsx";
import { Badge } from '@/components/badge'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/table'

function AccountsPage ({accounts}) {
    return (
        <div>
            <h1 className={'text-2xl'}>Аккаунты</h1>
            <div className={"flex justify-between mt-4"}>
                {/*<InputGroup>*/}
                {/*    <MagnifyingGlassIcon/>*/}
                {/*    <Input name="search" placeholder="Поиск&hellip;" aria-label="Search"/>*/}
                {/*</InputGroup>*/}
                <div></div>
            </div>
            <Divider className={'mt-4'}/>
            <Table className="[--gutter:theme(spacing.6)] sm:[--gutter:theme(spacing.8)]">
                <TableHead>
                    <TableRow>
                        <TableHeader>Дата добавления</TableHeader>
                        <TableHeader>Имя фамилия</TableHeader>
                        <TableHeader>Компания</TableHeader>
                        <TableHeader>Статус сессии</TableHeader>
                        <TableHeader>Действия</TableHeader>
                    </TableRow>
                </TableHead>
                <TableBody>
                    {accounts.map((account) => (
                        <TableRow key={account.id}>
                            <TableCell className="text-zinc-500">
                                {new Date(account.created_at).toLocaleDateString('ru-RU', {weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'})}
                            </TableCell>
                            <TableCell>
                                <div className="flex items-center gap-4">
                                    <div>
                                        <div className="font-medium">{account.user.name + ' ' + account.user.surname}</div>
                                        <div className="text-zinc-500">
                                            <a href="#" className="hover:text-zinc-700">
                                                {account.email}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </TableCell>
                            <TableCell>
                                <div className={"font-medium"}>{account.company}</div>
                            </TableCell>
                            <TableCell>
                                {account.status == 'approved' ? <Badge color="lime">Подтвержден</Badge> : <Badge color="zinc">Не подтвержден</Badge>}
                            </TableCell>
                            <TableCell>
                                <Button href={'/accounts/approve/' + account.id}>Подтвердить</Button>
                            </TableCell>
                        </TableRow>
                    ))}
                </TableBody>
            </Table>
        </div>
    );
}

AccountsPage.layout = (page) => (
    <MainLayout title="Аккаунты" children={page}/>
);

export default AccountsPage;
