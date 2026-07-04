import { Header } from "@/components/header"; // @efferd/header-1
import { HeroSection } from "@/components/hero";
import { LogosSection } from "@/components/logos-section";

export default function page() {
    return (
        <>
            <Header />
            <main className="grow">
                <HeroSection />
                <LogosSection />
            </main>
        </>
    );
}