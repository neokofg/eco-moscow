import {Head, usePage} from "@inertiajs/react";
import 'react-toastify/dist/ReactToastify.css';
import {
    Dropdown,
    DropdownButton,
    DropdownDivider,
    DropdownItem,
    DropdownLabel,
    DropdownMenu,
} from '@/components/dropdown'
import { Navbar, NavbarItem, NavbarSection, NavbarSpacer } from '@/components/navbar'
import {
    Sidebar,
    SidebarBody,
    SidebarFooter,
    SidebarHeader,
    SidebarItem,
    SidebarLabel,
    SidebarSection,
    SidebarSpacer,
} from '@/components/sidebar'
import { SidebarLayout } from '@/components/sidebar-layout'
import {
    ArrowRightStartOnRectangleIcon,
    ChevronUpIcon,
    Cog8ToothIcon,
    LightBulbIcon,
    ShieldCheckIcon,
    UserIcon,
} from '@heroicons/react/16/solid'
import {
    Cog6ToothIcon,
    HomeIcon,
    InboxIcon,
    MagnifyingGlassIcon,
    QuestionMarkCircleIcon,
    SparklesIcon,
    Square2StackIcon,
    TicketIcon,
} from '@heroicons/react/20/solid'
import {ToastContainer} from "react-toastify";
export default function MainLayout({ title, children }) {

    const { props } = usePage();
    const user = props.auth.user;

    return (
        <>
            <Head title={title} />
            <ToastContainer
                position="top-center"
                autoClose={5000}
                hideProgressBar={false}
                newestOnTop
                closeOnClick
                rtl={false}
                pauseOnFocusLoss
                draggable
                pauseOnHover
                theme="dark"
                transition: Slide
                className={"min-w-[14rem] md:min-w-[29rem]"}
            />
            <SidebarLayout
                navbar={
                    <Navbar>
                        <NavbarSpacer />
                        <NavbarSection>
                            <NavbarItem href="/search" aria-label="Search">
                                <MagnifyingGlassIcon />
                            </NavbarItem>
                            <NavbarItem href="/inbox" aria-label="Inbox">
                                <InboxIcon />
                            </NavbarItem>
                            <Dropdown>
                                <DropdownButton as={NavbarItem}>
                                    <span className="block truncate text-sm/5 font-medium text-zinc-950 dark:text-white">{user.login}</span>
                                </DropdownButton>
                                <DropdownMenu className="min-w-64" anchor="bottom end">
                                    <DropdownItem href="/my-profile">
                                        <UserIcon />
                                        <DropdownLabel>Мой профиль</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownItem href="/settings">
                                        <Cog8ToothIcon />
                                        <DropdownLabel>Настройки</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownDivider />
                                    <DropdownItem href="/privacy-policy">
                                        <ShieldCheckIcon />
                                        <DropdownLabel>Политика</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownItem href="https://t.me/gelious7">
                                        <LightBulbIcon />
                                        <DropdownLabel>Оставить отзыв</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownDivider />
                                    <DropdownItem href="/logout">
                                        <ArrowRightStartOnRectangleIcon />
                                        <DropdownLabel>Выйти</DropdownLabel>
                                    </DropdownItem>
                                </DropdownMenu>
                            </Dropdown>
                        </NavbarSection>
                    </Navbar>
                }
                sidebar={
                    <Sidebar>
                        <SidebarHeader>
                            <SidebarSection className="max-lg:hidden">
                                <SidebarItem href="/inbox">
                                    <InboxIcon />
                                    <SidebarLabel>Уведомления</SidebarLabel>
                                </SidebarItem>
                            </SidebarSection>
                        </SidebarHeader>
                        <SidebarBody>
                            <SidebarSection>
                                <SidebarItem href="/">
                                    <HomeIcon />
                                    <SidebarLabel>Главная</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/accounts">
                                    <TicketIcon />
                                    <SidebarLabel>Аккаунты на модерацию</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/news">
                                    <TicketIcon />
                                    <SidebarLabel>Новости</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/events">
                                    <TicketIcon />
                                    <SidebarLabel>Аналика мероприятий</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/news">
                                    <TicketIcon />
                                    <SidebarLabel>Аналика сообщества</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/organizers">
                                    <TicketIcon />
                                    <SidebarLabel>Аналика по организаторам</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/settings">
                                    <Cog6ToothIcon />
                                    <SidebarLabel>Настройки</SidebarLabel>
                                </SidebarItem>
                            </SidebarSection>
                            <SidebarSpacer />
                            <SidebarSection>
                                <SidebarItem href="https://t.me/gelious7">
                                    <QuestionMarkCircleIcon />
                                    <SidebarLabel>Помощь</SidebarLabel>
                                </SidebarItem>
                                <SidebarItem href="/changelog">
                                    <SparklesIcon />
                                    <SidebarLabel>Лента обновлений</SidebarLabel>
                                </SidebarItem>
                            </SidebarSection>
                        </SidebarBody>
                        <SidebarFooter className="max-lg:hidden">
                            <Dropdown>
                                <DropdownButton as={SidebarItem}>
                    <span className="flex min-w-0 items-center gap-3">
                      <span className="min-w-0">
                        <span className="block truncate text-sm/5 font-medium text-zinc-950 dark:text-white">{user.login}</span>
                      </span>
                    </span>
                                    <ChevronUpIcon />
                                </DropdownButton>
                                <DropdownMenu className="min-w-[14.3rem]" anchor="top start">
                                    <DropdownItem href="/my-profile">
                                        <UserIcon />
                                        <DropdownLabel>Мой профиль</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownItem href="/settings">
                                        <Cog8ToothIcon />
                                        <DropdownLabel>Настройки</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownDivider />
                                    <DropdownItem href="/privacy-policy">
                                        <ShieldCheckIcon />
                                        <DropdownLabel>Политика</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownItem href="https://t.me/gelious7">
                                        <LightBulbIcon />
                                        <DropdownLabel>Оставить отзыв</DropdownLabel>
                                    </DropdownItem>
                                    <DropdownDivider />
                                    <DropdownItem href="/logout">
                                        <ArrowRightStartOnRectangleIcon />
                                        <DropdownLabel>Выйти</DropdownLabel>
                                    </DropdownItem>
                                </DropdownMenu>
                            </Dropdown>
                        </SidebarFooter>
                    </Sidebar>
                }
            >
                <div className={'text-white'}>
                    {children}
                </div>
            </SidebarLayout>
        </>
    );
}
