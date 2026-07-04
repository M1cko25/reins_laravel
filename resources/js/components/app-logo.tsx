import AppLogoIcon from '@/components/app-logo-icon';

export default function AppLogo() {
    return (
        <>
            <div className="flex items-center justify-center">
                <AppLogoIcon className="size-5 fill-current text-primary dark:text-primary-foreground" />
                <span className="ml-1 text-sm font-semibold">Reins</span>
            </div>
        </>
    );
}
