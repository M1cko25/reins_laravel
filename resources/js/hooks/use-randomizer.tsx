import { useEffect, useState } from "react";

export function useRandomizer<T>(items: T[] | undefined | null) {
    const [random, setRandom] = useState<T | null>(null);

    useEffect(() => {
        if (!items || items.length === 0) {
            setRandom(null);
            return;
        }
        const random = items[Math.floor(Math.random() * items.length)];
        setRandom(random);
    }, [items]);

    return random;
}