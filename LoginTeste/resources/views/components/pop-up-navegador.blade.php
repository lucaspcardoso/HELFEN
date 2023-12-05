<div id="popup" class="popup">
    <div class="popup-content">
        <div>
            <h2>Desconectar Dispositivo</h2>
        </div>
        <div>
            <p>Digite sua senha para confirmar que deseja sair das outras sessões do navegador em todos os seus
                dispositivos.</p>
            <div class="mt-4" x-data="{}"
                x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                    placeholder="{{ __('Senha') }}" x-ref="password" wire:model.defer="password"
                    wire:keydown.enter="logoutOtherBrowserSessions" id="inPassVerific" />
                <!-- dar clear na senha dps -->
                <x-input-error for="password" class="mt-2" />
            </div>
        </div>

        <div>
            <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled" id="btnCancelar">
                {{ __('Cancelar') }}
            </x-secondary-button>
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Desconectar Dipositivos') }}
            </x-button>
        </div>

    </div>
</div>
